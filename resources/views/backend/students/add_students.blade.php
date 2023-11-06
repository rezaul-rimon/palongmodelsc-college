@extends('backend.layouts.back_app')

@section('content')

<div class="container">
    <div class="row">
        <div class="">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-primary my-4">নতুন শ্রেণী যুক্ত করুন</h2>
    
                <div class="border p-4 rounded">
                    <form action="{{ route('backend.store_students') }}" method="POST" id="notice" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="className" class="text-info">শ্রেণী</label>
                                    <select class="form-control @error('className') is-invalid @enderror" id="className" name="className" required>
                                        <option value="">শ্রেণী নির্বাচন করুন</option>
                                        @for ($class = 6; $class <= 12; $class++)
                                            <option value="{{ $class }}" {{ old('className') == $class ? 'selected' : '' }}>{{ $class }}-শ্রেণী</option>
                                        @endfor
                                    </select>
                                    @error('className')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>                    
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="classSection" class="text-info">শাখা</label>
                                    <select class="form-control @error('classSection') is-invalid @enderror" id="classSection" name="classSection" required>
                                        <option value="">শাখা নির্বাচন করুন</option>
                                        <option value="A" {{ old('classSection') == 'A' ? 'selected' : '' }}>A</option>
                                        <option value="B" {{ old('classSection') == 'B' ? 'selected' : '' }}>B</option>
                                        <option value="C" {{ old('classSection') == 'C' ? 'selected' : '' }}>C</option>
                                        <option value="D" {{ old('classSection') == 'D' ? 'selected' : '' }}>D</option>
                                        <option value="Computer" {{ old('classSection') == 'Computer' ? 'selected' : '' }}>Computer</option>
                                        <option value="Civil" {{ old('classSection') == 'Civil' ? 'selected' : '' }}>Civil</option>
                                    </select>
                                    @error('classSection')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div> 
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="maleStudents" class="text-info">ছাত্র</label>
                                    <input type="number" class="form-control @error('maleStudents') is-invalid @enderror" id="maleStudents" name="maleStudents" value="{{ old('maleStudents', 0) }}" required min="0" max="9999">
                                    @error('maleStudents')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>                                        
                        
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="femaleStudents" class="text-info">ছাত্রী</label>
                                    <input type="number" class="form-control @error('femaleStudents') is-invalid @enderror" id="femaleStudents" name="femaleStudents" value="{{ old('femaleStudents', 0) }}" required min="0" max="9999">
                                    @error('femaleStudents')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="hinduStudents" class="text-info">হিন্দু</label>
                                    <input type="number" class="form-control @error('hinduStudents') is-invalid @enderror" id="hinduStudents" name="hinduStudents" value="{{ old('hinduStudents', 0) }}" required min="0" max="9999">
                                    @error('hinduStudents')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="buddistStudents" class="text-info">বৌদ্ধ</label>
                                    <input type="number" class="form-control @error('buddistStudents') is-invalid @enderror" id="buddistStudents" name="buddistStudents" value="{{ old('buddistStudents', 0) }}" required min="0" max="9999">
                                    @error('buddistStudents')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <a class="btn btn-warning form-control" href="{{ route('backend.students') }}">ফিরে যান</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="submit" value="যুক্ত করুন" class="btn btn-success form-control">
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



