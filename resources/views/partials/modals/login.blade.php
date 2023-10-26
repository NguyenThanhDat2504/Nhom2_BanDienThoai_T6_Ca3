<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content p-2">

      <div class="modal-body">

        <div class="auth-form">
          
          <form action="{{ route('auth.login') }}" method="POST" id="loginForm">
            @csrf

            <div class="text-center my-3" style="font-weight: bold; font-size: 40px;">
              MOBILE<span style="color: #FE4C50">TECH</span>
            </div>

            <div class="bg-danger text-white p-3 rounded fs-5 auth-error" style="display: none"></div>

            <div class="auth-form_input mt-5">
              <input type="text" class="form-control form-control-lg" style="font-size: 17px;" id="loginEmail" name="email" placeholder="Email">
              <div class="input-error email-error p-2" style="color: #FE4C50"></div>
            </div>

            <div class="auth-form_input mt-2">
              <input type="password" class="form-control form-control-lg" style="font-size: 17px;" id="loginPassword" name="password" placeholder="Mật khẩu">
              <div class="input-error password-error p-2" style="color: #FE4C50"></div>
            </div>

            <div class="text-right py-2">
              <a href="#" style="color: #FE4C50">Quên mật khẩu?</a>
            </div>

            <button type="submit" class="auth-form_btn btn btn-lg text-white w-100" style="background-color: #FE4C50; cursor: pointer;">Đăng nhập</button>

            <div class="my-3 text-center" style="font-size: 13px;">
              <hr>
            </div>

            <a class="btn btn-lg w-100 mb-2 text-white" style="background-color: #DD4B39; cursor: pointer;">Đăng nhập bằng Google <i class="bx bxl-google"></i></a>

            <div class="auth-form_bottom mt-4 text-center">
              Chưa có tài khoản ? <a type="button" data-toggle="modal" data-target="#registerModal" data-dismiss="modal" style="color: #FE4C50; cursor: pointer;">Đăng ký</a>
            </div>

          </form>

        </div>
        
      </div>

    </div>

  </div>

</div>

<script>
  const loginForm = document.querySelector('#loginForm')

  loginForm.addEventListener('submit', (e) => {
    e.preventDefault()

    const data = {
      '_token': '{{ csrf_token() }}',
      'email': document.querySelector('#loginModal input[name=email]').value,
      'password': document.querySelector('#loginModal input[name=password]').value,
    }

    fetch('{{ route('auth.login') }}', {
      method: 'POST',
      body: JSON.stringify(data),
      headers: {
        'Accept': 'application/json',
        'Content-type': 'application/json',
      },
    })
    .then(res => res.json())
    .then(data => {
      console.log(data);
      if(!data.status) {
        for (const message in data.messages) {
          document.querySelector(`#loginForm .${message}-error`).style.display = 'block';
          document.querySelector(`#loginForm .${message}-error`).innerHTML = data.messages[message];
        }
      }
      else {
        window.location.href = data.redirectUrl
      }
    })
  })

  const loginInputs = document.querySelectorAll('#loginForm input')
  loginInputs.forEach(input => {
    input.addEventListener('input', () => {
      const authErrorMessage = document.querySelector('.auth-error')
      if(authErrorMessage) authErrorMessage.style.display = 'none'

      const inputErrorMessage = document.querySelector(`input[id=${input.id}] + .input-error`)
      if(inputErrorMessage) inputErrorMessage.style.visibility = 'hidden'
    })
  })
</script>
