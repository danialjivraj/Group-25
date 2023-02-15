

<form action="/userRegistration" method="post" class="signin-inputs">
                @csrf
                <input type="text" name="Fullname" placeholder="Your name" class="input-field2" required/><br>
                <div class="errorlog">
                    @error('Fullname')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <input type="email" name="email" placeholder="Your email" class="input-field2" required/><br>
                <div class="errorlog">
                    @error('email')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <input type="password" name="password" placeholder="Password" class="input-field2" required/><br>
                <div class="errorlog">
                    @error('password')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <input type="password" name="password_confirmation" placeholder="Retype Password"
                    class="input-field2" required/><br>
                <div class="errorlog">
                    @error('password_confirmation')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <br>
                <button type="submit" class="reg-btn">Register</button>

            </form>
