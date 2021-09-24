@if (session()->has('loginOk'))
    <script>
        let timerInterval
        Swal.fire({
            title: 'Login Berhasil!',
            html: '{{ session()->get('loginOk') }}',
            timer: 1000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                    const content = Swal.getContent()
                    if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                            b.textContent = Swal.getTimerLeft()
                        }
                    }
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
        })
    </script>
@elseif (session()->has('loginFail'))
    <script>
        Swal.fire({
            position: 'top',
            icon: 'error',
            title: '{{ session()->get('loginFail') }}',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@elseif (session()->has('Ok'))
    <script>
        Swal.fire({
            position: 'top',
            icon: 'success',
            title: '{{ session()->get('Ok') }}',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@elseif (session()->has('Fail'))
    <script>
        Swal.fire({
            position: 'top',
            icon: 'error',
            title: '{{ session()->get('Fail') }}',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@elseif (session()->has('logout'))
    <script>
        Swal.fire({
            position: 'top',
            title: '{{ session()->get('logout') }}',
            showConfirmButton: false,
            timer: 2000
        })
    </script>

@endif
