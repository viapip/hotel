@extends('admin.layouts.app')

@section('content')


    <form id="test123" action="/admin">
        <input name="image" type="file">
        <button>оптправка</button>
    </form>
    <input style="width: 100%" id="dragZoneInput" type="text" value="https://klike.net/uploads/posts/2019-03/medium/1551511866_11.jpg,https://klike.net/uploads/posts/2019-03/1551511801_1.jpg,https://klike.net/uploads/posts/2019-03/medium/1551511784_4.jpg,https://klike.net/uploads/posts/2019-03/1551511774_9.jpg">

    <button id="uploadZone" class="zoneUpload">
        Загрузить
    </button>
    <ul id="dragZone" class="drag-zone">
    </ul>

    <script src="{{ 'adminJS/uploaderDragZone.js' }}">

    </script>
    <script>

        const test = new DragDrop({zone: '#dragZone', input: '#dragZoneInput', uploadZone: '#uploadZone'})


        // const getToken = (name) => {
        //     let matches = document.cookie.match(new RegExp(
        //         "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        //     ));
        //     return matches ? decodeURIComponent(matches[1]) : undefined;
        // }
        //
        // const fetchData = async (data, url) => {
        //     try {
        //         const response = fetch(url, {
        //             method: "POST",
        //             headers: {
        //                 'X-XSRF-TOKEN':  getToken('XSRF-TOKEN')
        //             },
        //             body: data,
        //         })
        //         return true
        //     } catch (e) {
        //         console.log(e)
        //         return false;
        //     }
        // }
        // document.querySelector('#test123')
        //     .addEventListener('submit', async (e) => {
        //         e.preventDefault()
        //         const target = e.currentTarget
        //         target.querySelector('button').innerText = 'грузим'
        //         const formData = new FormData(target);
        //         const url = target.getAttribute('action')
        //         const response = await fetchData(formData, url)
        //         if(!response) {
        //             target.querySelector('button').innerText = 'неудачно'
        //             return false;
        //         }
        //
        //         target.querySelector('button').innerText = 'отправилось'
        //
        //     })
    </script>

    <style>
        .container {
            max-width: 1000px;
            margin: auto; }

        .zoneUpload {
            width: 100%;
            height: 50px;
            background: #424454;
            border: none;
            outline: none;
            box-shadow: none;
            margin-bottom: 30px;
            border-radius: 10px;
            color: white; }

        .drag-zone {
            cursor: pointer;
            list-style-type: none;
            display: flex;
            flex-wrap: wrap;
            transition: background-color 0.2s linear; }
        .drag-zone.zone-in {
            background-color: antiquewhite; }
        .drag-zone__close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: transparent;
            border-radius: 5px;
            cursor: pointer;
            padding: 3px;
            display: flex; }
        .drag-zone__close svg {
            height: 15px;
            width: 15px; }
        .drag-zone__close:hover {
            background: white; }
        .drag-zone__item {
            width: 100%;
            max-width: 10%;
            padding-bottom: 5px;
            padding-top: 5px;
            text-align: center;
            cursor: grab;
            display: block;
            position: relative;
            padding-left: 5px;
            padding-right: 5px; }
        .drag-zone__item.current-drag {
            opacity: 0.4;
            cursor: grabbing; }
        .drag-zone__item.over {
            transform: scale(1.1);
            border-left: 2px solid blue;
            cursor: grabbing; }
        .drag-zone__item.last-element {
            background: transparent;
            cursor: auto; }
        .drag-zone__item:hover:active {
            cursor: grabbing; }
        .drag-zone__wrapper-img {
            position: relative;
            width: 100%;
            color: black;
            border-radius: 30px;
            overflow: hidden; }
        .drag-zone__wrapper-img:before {
            display: block;
            content: "";
            padding-bottom: 100%; }
        .drag-zone__img {
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat; }

        /*# sourceMappingURL=drag-zone.css.map */








    </style>
@endsection
