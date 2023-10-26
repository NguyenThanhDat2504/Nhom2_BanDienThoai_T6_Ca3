<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-hidden="true">

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
                <input type="text" class="form-control form-control-lg" style="font-size: 17px;" id="loginEmail" name="oldPassword" placeholder="Mật khẩu cũ">
                <div class="input-error email-error p-2" style="color: #FE4C50"></div>
              </div>
              
              <div class="auth-form_input mt-5">
                <input type="text" class="form-control form-control-lg" style="font-size: 17px;" id="loginEmail" name="password" placeholder="Mật khẩu mới">
                <div class="input-error email-error p-2" style="color: #FE4C50"></div>
              </div>

              <div class="auth-form_input mt-2">
                <input type="password" class="form-control form-control-lg" style="font-size: 17px;" id="loginPassword" name="password_confirmatiob" placeholder="Nhập lại mật khẩu">
                <div class="input-error password-error p-2" style="color: #FE4C50"></div>
              </div>
  
  
              <button type="submit" class="auth-form_btn btn btn-lg text-white w-100" style="background-color: #FE4C50; cursor: pointer;">Đổi mật khẩu</button>
  
            </form>
  
          </div>
          
        </div>
  
      </div>
  
    </div>
  
  </div>
  