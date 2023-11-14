@extends('backend.layouts.back_app')

@section('content')

<div class="container">
    <div class="row">
        <div class="">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-primary my-4">ইউজার তথ্য সংশোধন করুন</h2>
    
                <div class="border p-4 rounded">
                    <form action="{{ route('backend.update_user', $user->id) }}" method="POST" id="notice" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="name" class="text-info">ইউজারের নাম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="email" class="text-info">ইউজারের ইমেইল <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label class="text-info">ইউজারের রোল <span class="text-danger">*</span></label>
                                    <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                                        <option value="0" {{ old('role', $user->role) == 0 ? 'selected' : '' }}>Normal</option>
                                        <option value="1" {{ old('role', $user->role) == 1 ? 'selected' : '' }}>Admin</option>
                                        <option value="2" {{ old('role', $user->role) == 2 ? 'selected' : '' }}>Super Admin</option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label class="text-info">ইউজারের পারমিশন <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input @error('permission') is-invalid @enderror" id="permissionYes" name="permission" value="1" {{ old('permission', $user->permission) == 1 ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="permissionYes">হ্যাঁ</label>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input @error('permission') is-invalid @enderror" id="permissionNo" name="permission" value="0" {{ old('permission', $user->permission) == 0 ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="permissionNo">না</label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('permission')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-4">
                                <span class="text-danger">সতর্কতাঃ সুপার এডমিন শুধুমাত্র ১-জন ইউজারই হতে পারে। </span><br>
                                <span class="text-danger" style="font-size: 14px;">এই ইউজার কে সুপার এডমিন বানিয়ে দিলে আপনার সুপার এডমিন ক্ষমতা রহিত হয়ে যাবে।</span>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <a class="btn btn-warning form-control" href="{{ route('backend.users') }}">ফিরে যান</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="submit" value="আপডেট করুন" class="btn btn-success form-control">
                                </div>
                            </div>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

            
@endsection

