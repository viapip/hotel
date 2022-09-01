

export default {
    data() {
        return {
            delayAnimation: 200
        }
    },
    methods: {
        settingsAnimation(counter) {
            const time = counter * 0.001
            return `opacity ${time}s linear, transform ${time}s ease-in`
        },
        childAnimation(children, parent) {
            let counter = this.delayAnimation
            for (let child of children) {
                child.style.transition = this.settingsAnimation(counter)
                child.classList.add('scroll-animation__child--show')
                setTimeout(() => child.style.opacity = '1', counter)
                counter += this.delayAnimation
            }
            setTimeout(() => parent.classList.add('scroll-animation__full-ready'), counter)

        },
        onEntry(entry) {
            entry.forEach(change => {
                if (change.isIntersecting) {
                    const target = change.target;
                    const targetChildren = Array.from(target.querySelectorAll('.scroll-animation__child'))
                    this.childAnimation(targetChildren, target)
                    target.classList.add('scroll-animation__show');
                }
            });
        },
        watchObserver() {
            const threshold = window.innerWidth < 800 ? [0.2] : [0.4]
            let options = { threshold: threshold };
            let observer = new IntersectionObserver(this.onEntry, options);
            let elements = Array.from(document.querySelectorAll('.scroll-animation'));
            for (let elm of elements) {
                observer.observe(elm);
            }
        },
    },
    mounted() {
        this.watchObserver()
    }
}
