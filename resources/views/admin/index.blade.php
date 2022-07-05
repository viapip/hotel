@extends('admin.layouts.app')

@section('content')


    <form id="test123" action="/admin/image">
        <input name="file" type="file">
        <button>оптправка</button>
    </form>

    <script>

        const getToken = () => {
            const csrfToken = document.querySelector('[name="csrf-token"]')
            if (!csrfToken) {
                console.log('траблы с токеном')
                return false;
            }
            return csrfToken.getAttribute('content')
        }

        const fetchData = async (data, url) => {
            try {
                const response = fetch(url, {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN':  getToken('XSRF-TOKEN')
                    },
                    body: data,
                })
                return true
            } catch (e) {
                console.log(e)
                return false;
            }
        }
        document.querySelector('#test123')
            .addEventListener('submit', async (e) => {
                e.preventDefault()
                const target = e.currentTarget
                target.querySelector('button').innerText = 'грузим'
                const formData = new FormData(target);
                const url = target.getAttribute('action')
                const response = await fetchData(formData, url)
                if(!response) {
                    target.querySelector('button').innerText = 'неудачно'
                    return false;
                }

                target.querySelector('button').innerText = 'отправилось'

            })
    </script>

@endsection
