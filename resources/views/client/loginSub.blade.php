<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Đăng nhập</h1>
            </div>
            <div class="modal-body" id="loginSub">
                <div class="wrapper">
                    <div class="card-switch">
                        <label class="switch">
                            <input type="checkbox" class="toggle">
                            <span class="slider"></span>
                            <span class="card-side"></span>
                            <div class="flip-card__inner">
                                <!-- Form Đăng nhập -->
                                <div class="flip-card__front">
                                    <div class="title">Đăng nhập</div>
                                    <form class="login-form">
                                        @csrf
                                        <input class="flip-card__input" name="email" placeholder="Email"
                                            type="email" required>
                                        <input class="flip-card__input" name="password" placeholder="Mật khẩu"
                                            type="password" required>
                                        <button class="flip-card__btn" type="submit">Xác nhận</button>
                                    </form>
                                </div>

                                <!-- Form Đăng ký -->
                                <div class="flip-card__back">
                                    <div class="title">Đăng ký</div>
                                    <form class="register-form">
                                        @csrf
                                        <input class="flip-card__input" name="user_name" placeholder="Tên đăng nhập"
                                            type="text" required>
                                        <input class="flip-card__input" name="email" placeholder="Email"
                                            type="email" required>
                                        <input class="flip-card__input" name="password" placeholder="Mật khẩu"
                                            type="password" required>
                                        <button class="flip-card__btn" type="submit">Đăng ký</button>
                                    </form>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript để tự động bật modal khi load trang -->
<script>
    window.onload = function() {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        myModal.show();
    };
</script>
<script>
    $(document).ready(function() {
        // Xử lý đăng ký
        $('form.register-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('client.register') }}',
                method: 'POST',
                data: {
                    user_name: $(this).find('input[name="user_name"]').val(),
                    email: $(this).find('input[name="email"]').val(),
                    password: $(this).find('input[name="password"]').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.message);
                    if (response.success) {
                        $('#exampleModal').modal('hide');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 400) {
                        alert(xhr.responseJSON.message);
                    } else {
                        alert('Đã xảy ra lỗi. Vui lòng thử lại.');
                    }
                }
            });
        });

        // Xử lý đăng nhập
        $('form.login-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('client.login') }}',
                method: 'POST',
                data: {
                    email: $(this).find('input[name="email"]').val(),
                    password: $(this).find('input[name="password"]').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        $('#exampleModal').modal('hide');
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('Đã xảy ra lỗi. Vui lòng thử lại.');
                }
            });
        });
    });
</script>

<style>
    /* From Uiverse.io by andrew-demchenk0 */
    #loginSub .wrapper {
        --input-focus: #2d8cf0;
        --font-color: #323232;
        --font-color-sub: #666;
        --bg-color: #fff;
        --bg-color-alt: #666;
        --main-color: #323232;

        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }

    /* switch card */
    #loginSub .switch {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 30px;
        width: 50px;
        height: 20px;
    }

    #loginSub .card-side::before {
        position: absolute;
        content: 'Log in';
        left: -70px;
        top: 0;
        width: 100px;
        text-decoration: underline;
        color: var(--font-color);
        font-weight: 600;
    }

    #loginSub .card-side::after {
        position: absolute;
        content: 'Sign up';
        left: 70px;
        top: 0;
        width: 100px;
        text-decoration: none;
        color: var(--font-color);
        font-weight: 600;
    }

    #loginSub .toggle {
        opacity: 0;
        width: 0;
        height: 0;
    }

    #loginSub .slider {
        box-sizing: border-box;
        border-radius: 5px;
        border: 2px solid var(--main-color);
        box-shadow: 4px 4px var(--main-color);
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: var(--bg-colorcolor);
        transition: 0.3s;
    }

    #loginSub .slider:before {
        box-sizing: border-box;
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        border: 2px solid var(--main-color);
        border-radius: 5px;
        left: -2px;
        bottom: 2px;
        background-color: var(--bg-color);
        box-shadow: 0 3px 0 var(--main-color);
        transition: 0.3s;
    }

    #loginSub .toggle:checked+.slider {
        background-color: var(--input-focus);
    }

    #loginSub .toggle:checked+.slider:before {
        transform: translateX(30px);
    }

    #loginSub .toggle:checked~.card-side:before {
        text-decoration: none;
    }

    #loginSub .toggle:checked~.card-side:after {
        text-decoration: underline;
    }

    /* card */

    #loginSub .flip-card__inner {
        width: 300px;
        height: 350px;
        position: relative;
        background-color: transparent;
        perspective: 1000px;
        text-align: center;
        transition: transform 0.8s;
        transform-style: preserve-3d;
    }

    #loginSub .toggle:checked~.flip-card__inner {
        transform: rotateY(180deg);
    }

    #loginSub .toggle:checked~.flip-card__front {
        box-shadow: none;
    }

    #loginSub .flip-card__front,
    #loginSub .flip-card__back {
        padding: 20px;
        position: absolute;
        display: flex;
        flex-direction: column;
        justify-content: center;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        background: lightgrey;
        gap: 20px;
        border-radius: 5px;
        border: 2px solid var(--main-color);
        box-shadow: 4px 4px var(--main-color);
    }

    #loginSub .flip-card__back {
        width: 100%;
        transform: rotateY(180deg);
    }

    #loginSub .flip-card__form {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    #loginSub .title {
        margin: 20px 0 20px 0;
        font-size: 25px;
        font-weight: 900;
        text-align: center;
        color: var(--main-color);
    }

    #loginSub .flip-card__input {
        width: 250px;
        height: 40px;
        border-radius: 5px;
        border: 2px solid var(--main-color);
        background-color: var(--bg-color);
        box-shadow: 4px 4px var(--main-color);
        font-size: 15px;
        font-weight: 600;
        color: var(--font-color);
        padding: 5px 10px;
        outline: none;
    }

    #loginSub .flip-card__input::placeholder {
        color: var(--font-color-sub);
        opacity: 0.8;
    }

    #loginSub .flip-card__input:focus {
        border: 2px solid var(--input-focus);
    }

    #loginSub .flip-card__btn:active,
    #loginSub .button-confirm:active {
        box-shadow: 0px 0px var(--main-color);
        transform: translate(3px, 3px);
    }

    #loginSub .flip-card__btn {
        margin: 20px 0 20px 0;
        width: 120px;
        height: 40px;
        border-radius: 5px;
        border: 2px solid var(--main-color);
        background-color: var(--bg-color);
        box-shadow: 4px 4px var(--main-color);
        font-size: 17px;
        font-weight: 600;
        color: var(--font-color);
        cursor: pointer;
    }
</style>
