@extends('backend.layouts.back_app')

@section('content')

<div class="container">
    <div class="row">
        <div class="">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-primary my-4">শিক্ষকের তথ্য সংশোধন করুন</h2>
    
                <div class="border p-4 rounded">
                    <form action="{{ route('backend.update_teacher', $teacher->id) }}" method="POST" id="notice" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="teacherName" class="text-info">শিক্ষকের নাম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('teacherName') is-invalid @enderror" id="teacherName" name="teacherName" value="{{ old('teacherName', $teacher->teacher_name) }}" required>
                            @error('teacherName')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group mb-4">
                            <label for="teacherDesignation" class="text-info">শিক্ষকের পদবী <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('teacherDesignation') is-invalid @enderror" id="teacherDesignation" name="teacherDesignation" value="{{ old('teacherDesignation', $teacher->teacher_designation) }}" required>
                            @error('teacherDesignation')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div class="form-group mb-4">
                            <label for="teacherDescription" class="text-info">সংখিপ্ত বিবরণ <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('teacherDescription') is-invalid @enderror" id="teacherDescription" name="teacherDescription" required>{{ old('teacherDescription', $teacher->teacher_description) }}</textarea>
                            @error('teacherDescription')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div class="form-group mb-4">
                            <label for="takenSubject" class="text-info">গৃহীত বিষয় সমূহ <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('takenSubject') is-invalid @enderror" id="takenSubject" name="takenSubject" required rows="1">{{ old('takenSubject', $teacher->taken_subject) }}</textarea>
                            @error('takenSubject')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group mb-4">
                            <label for="teacherPhoto" class="text-info">শিক্ষকের ছবি <span class="text-primary">(ঐচ্ছিক)</span></label>
                            <input type="file" class="form-control @error('teacherPhoto') is-invalid @enderror" id="teacherPhoto" name="teacherPhoto" value="{{ old('teacherPhoto', $teacher->teacher_photo) }}">
                            @error('teacherPhoto')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <a class="btn btn-warning form-control" href="{{ route('backend.teacher') }}">ফিরে যান</a>
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

