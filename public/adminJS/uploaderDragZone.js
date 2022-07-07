class CookiesWorker {
    static getCookie(name) {
        let matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
}


class ApiWorker {
    static async send(url, data) {
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-XSRF-TOKEN': CookiesWorker.getCookie('XSRF-TOKEN')
                },
                body: data,
            })
            console.log(response)
            return await response.text()
        } catch (err) {
            console.log(err)
        }
    }

    static async delete(url, data) {
        try {
            const response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-XSRF-TOKEN': CookiesWorker.getCookie('XSRF-TOKEN'),
                    'Content-Type': 'application/json'
                },
                body: data,
            })
            console.log(await response.text())
            return true
        } catch (err) {
            console.log(err)
            return false;
        }
    }

}


class HandlerDragZone {
    input = null
    array = []
    dragZone = null
    newArray = []
    deleteArray = []

    constructor(input, zone) {
        this.initInput = input;
        this.dragZone = zone;
    }

    setDragZone(zone) {
        if (!zone) return console.error('Отсутвует element')

        if (typeof zone === 'string') {
            this.dragZone = document.querySelector(zone)
        } else {
            this.dragZone = zone
        }
    }

    detectInput() {
        if (!this.initInput) return console.error('Отсутвует input')
        if (typeof this.initInput === 'string') {
            this.input = document.querySelector(this.initInput)
        } else {
            this.input = this.initInput;
        }
    }


    listenerZone() {

    }


    parsingInputItems() {
        this.detectInput()
        if (!this.input.value) return false;
        this.array = this.input.value.split(',');
        this.newArray.push(...this.array)
    }


    createLastElementDragZone(zone) {
        const lastZone = document.createElement('div');
        lastZone.classList.add('drag-zone__item', 'last-element')
        lastZone.insertAdjacentHTML('beforeend', `
        <li class="drag-zone__item last-element" >
            <div class="drag-zone__wrapper-img">
                <div class="drag-zone__img"></div>
            </div>
        </li>
        `)
        zone.insertAdjacentElement('beforeend', lastZone)
        return lastZone;
    }

    parsingDropZoneItems() {
        const listChildDragZone = this.dragZone.querySelectorAll('.drag-zone__item')
        if (!listChildDragZone) return this.errorLogger('Не имеет дочерних элементов')
        this.newArray = []
        listChildDragZone.forEach(function (item, index) {
            if (!item.classList.contains('last-element')) {
                const img = item.dataset.content;
                this.newArray.push(img);
            }
        }, this)
        console.log(this.newArray, 'newArrayParse')
        this.setValueInput()
    }

    setValueInput() {
        this.input.value = this.newArray.join(',')
    }


    errorLogger(name) {
        console.error(name)
    }
}


class DragDrop extends HandlerDragZone {

    constructor({button, zone, input, uploadZone}) {
        super(input);
        this.curDragEl = null;
        this.button = button;
        this.zone = zone;
        this.uploadZone = uploadZone;
        this.handlerDelete = this.deleteExitCurrentPage.bind(this)
        this.init();

    }

    async deleteImagesSubmitForm() {
       await this.deletingImages(this.deleteArray)
    }
    deleteSelectedImage(item) {
        console.log(item)
        const link = item.dataset.content;
        // this.newArray = this.newArray.filter(item => item !== link)
        this.deleteArray.push(link);
        this.dragZone.removeChild(item)
        super.parsingDropZoneItems()
    }

    async deletingImages(deletingArray) {
        // const array = this.deleteArray
        if (!deletingArray.length) return false;
        let formData = {
            images: deletingArray,
        }
        // let formData = new FormData()
        // deletingArray.forEach(item => formData.append('images[]', item))
        await ApiWorker.delete('/admin/image', JSON.stringify(formData))
    }

    listenerForm() {
        document.querySelectorAll('form').forEach(function(form){
            form.addEventListener('submit', async function(e){

                this.setValueInput();
                window.removeEventListener('beforeunload', this.handlerDelete)
               await this.deleteImagesSubmitForm()
                console.log('delete success')

            }.bind(this))
        }, this)
    }

    async deleteExitCurrentPage(e) {
        const array = this.array
        this.newArray.push(...this.deleteArray)
        let filteredArray = this.newArray.filter(item => !array.includes(item))
        if (!filteredArray.length) return false;
        this.input.value = this.array.join(',')
        await this.deletingImages(filteredArray)
        console.log('exit pages')
    }

    init() {
        console.log('init')
        super.setDragZone(this.zone)
        this.detectUploadZone(this.uploadZone)
        this.uploadZone.addEventListener('click', this.createInput.bind(this))
        const lastElement = super.createLastElementDragZone(this.dragZone)
        super.parsingInputItems()
        this.renderInitItems()
        this.addDnDHandlers(lastElement)

        window.addEventListener('beforeunload', this.handlerDelete)
        this.listenerForm()
    }

    // createUploadZone() {
    //     const uploadZone =
    // }
    detectUploadZone(zone) {
        if (!zone) return this.errorLogger('Не выбрана зона загрузки "uploadZone"')

        if (typeof zone === 'string') {
            this.uploadZone = document.querySelector(zone)
        } else {
            this.uploadZone = zone
        }
    }
    async uploadImages(file) {
        const formData = new FormData()
        formData.append('image', file)
        const url = await ApiWorker.send('/admin/image', formData)
        this.renderUploadedItem(url)
        this.newArray.push(url)
        console.log(this.newArray, 'newArray');
        super.setValueInput()
        console.log(this.array, 'Array');
    }

    async handlerInputImages(e) {
        const files = e.target.files
        for await (let file of files) {
            await this.uploadImages(file)
        }
    }

    createInput(e) {
        e.preventDefault();
        const input = document.createElement('input')
        input.setAttribute('type', 'file')
        input.setAttribute('multiple', 'true')

        input.addEventListener('change', function (e) {
            this.handlerInputImages(e)
        }.bind(this));
        input.click();
    }

    templateCloseRender() {
        const closeItem = document.createElement('div')
        closeItem.classList.add('drag-zone__close')
        closeItem.insertAdjacentHTML('beforeend', `
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1 1L11 11" stroke="#242424" stroke-width="2"/>
<path d="M11 1L1 11" stroke="#242424" stroke-width="2"/>
</svg>

        `)
        closeItem.addEventListener('click', function(e) {
            e.preventDefault()
            const item = e.currentTarget.parentNode
            this.deleteSelectedImage(item)
        }.bind(this) )

        return closeItem
    }

    templateRender(url) {

        const li = document.createElement('li')
        li.classList.add('drag-zone__item')
        li.setAttribute('draggable', 'true')
        li.dataset.content = url
        li.insertAdjacentHTML('afterbegin', `
            <div id="1" class="drag-zone__wrapper-img">
                    <div class="drag-zone__img"
                         style="background-image: url('/${url}')"
                    ></div>
                </div>
        `)
        li.insertAdjacentElement('beforeend', this.templateCloseRender())
        return li
    }

    renderUploadedItem(link) {
        const template = this.templateRender(link);
        this.addDnDHandlers(template);
        this.dragZone.lastChild.insertAdjacentElement('beforeBegin', template);
    }

    renderInitItems() {
        if (this.array.length === 0) return false;
        console.log(this.array ,'renderInitItems')
        this.array.forEach(function (item, index) {
            const template = this.templateRender(item);

            this.addDnDHandlers(template)
            this.dragZone.lastChild.insertAdjacentElement('beforeBegin', template);
        }, this)
    }

    handleDragStart(e) {
        this.curDragEl = e.currentTarget;
        e.dataTransfer.effectAllowed = 'move';
        e.dataTransfer.setData('text/html', e.currentTarget.outerHTML);
        // e.currentTarget.style.visibility
        e.currentTarget.classList.add('current-drag');
    }

    handleDragOver(e) {
        if (e.preventDefault) {
            e.preventDefault();
        }
        e.currentTarget.classList.add('over');
        // e.dataTransfer.dropEffect = 'move';
        return false;
    }

    handleDragEnter(e) {
        this.dragZone.classList.add('zone-in')
    }

    handleDragLeave(e) {
        e.currentTarget.classList.remove('over');
    }

    handleDrop(e) {
        const target = e.currentTarget
        if (e.stopPropagation) {
            e.stopPropagation()
        }

        if (this.curDragEl !== target) {
            // console.log(this.curDragEl, 'this')
            // console.log(target, 'target', )
            target.parentNode.removeChild(this.curDragEl);
            const dropHTML = e.dataTransfer.getData('text/html');
            target.insertAdjacentHTML('beforebegin', dropHTML);
            const dropElem = target.previousSibling;
            this.addDnDHandlers(dropElem);
        }
        target.classList.remove('over');
        target.classList.remove('current-drag');

        super.parsingDropZoneItems();

        return false;
    }

    handleDragEnd(e) {
        this.dragZone.classList.remove('zone-in');
        this.curDragEl.classList.remove('over');
        this.curDragEl.classList.remove('current-drag');
    }

    addDnDHandlers(element) {
        element.addEventListener('dragstart', this.handleDragStart.bind(this), false);
        element.addEventListener('dragenter', this.handleDragEnter.bind(this), false)
        element.addEventListener('dragover', this.handleDragOver.bind(this), false);
        element.addEventListener('dragleave', this.handleDragLeave.bind(this), false);
        element.addEventListener('drop', this.handleDrop.bind(this), false);
        element.addEventListener('dragend', this.handleDragEnd.bind(this), false);
    }

    log(e) {
        console.log(this.text, 'text')
        console.log(e)
    }

    listener() {
        this.button.addEventListener('click', this.log.bind(this));
        this.text = '111'
        console.log(this.text, 'context')
    }
}


// const button = document.querySelector('button')
// const test = new DragDrop({button: button, zone: '#dragZone', input: '#dragZoneInput'})
// test.listener()
// test.init()
