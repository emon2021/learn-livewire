<div>
    <section id="form">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">{{ __('Register') }}</div>
                        <div class="card-body">
                            @session('success')
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endsession
                            <form action="{{ route('store') }}" wire:submit.prevent='store' >
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input id="name" wire:model.live='name' type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input id="email" wire:model.live='email' type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" wire:model.live='password' type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" wire:model.live='password_confirmation' type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password (Optional)" name="password_confirmation"  autocomplete="new-password">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn mt-4 btn-primary">{{ __('Register') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="search">

                            <input type="text" wire:model.live='search' placeholder="Search">

                            <span wire:loading>loading...</span>

                    </div>
                    @session('delete')
                        <div class="alert alert-danger">{{ session('delete') }}</div>
                    @endsession
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary">Edit</a>
                                    <a href="#"
                                    wire:click.prevent ='delete({{ $user->id }})'
                                    wire:confirm='Are you sure?'
                                    class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">No users found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
