<div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <ul class="nav nav-tabs" id="authTab">
                    <li class="nav-item">
                        <button class="nav-link @if($tabName == 'login') active @endif" data-bs-toggle="tab" wire:click="tabClick('login')">Login</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link @if($tabName == 'register') active @endif" data-bs-toggle="tab"  wire:click="tabClick('register')">Register</button>
                    </li>
                </ul>
                <div class="tab-content p-4 border border-top-0">
                    <div class="tab-pane fade @if($tabName == 'login') show active @endif" id="{{$tabName}}">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" wire:model.defer="loginEmail">
                            @error('loginEmail') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" wire:model.defer="loginPassword">
                            @error('loginPassword') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="button" class="btn btn-primary w-100" wire:click="login">Login</button>
                    </div>
                    <div class="tab-pane fade @if($tabName == 'register') show active @endif" id="{{$tabName}}">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" wire:model.defer="name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" wire:model.defer="email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" wire:model.defer="password" required>
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" wire:model="password_confirmation">
                        </div>
                        <button type="button" class="btn btn-success w-100" wire:click="register">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
