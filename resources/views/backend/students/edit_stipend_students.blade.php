@extends('backend.layouts.back_app')

@section('content')

<div class="container">
    <div class="row">
        <div class="">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-primary my-4">বৃত্তিপ্রাপ্ত শ্রেণী সংশোধন করুন</h2>
    
                <div class="border p-4 rounded">
                    <form action="{{ route('backend.update_stipend_students', $student->id) }}" method="POST" id="notice">
                        @csrf
                    
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group mb-4">
                                    <label for="class_name" class="text-info">বৃত্তিপ্রাপ্ত শ্রেণী</label>
                                    <select class="form-control @error('class_name') is-invalid @enderror" id="class_name" name="class_name" required>
                                        <option value="">শ্রেণী নির্বাচন করুন</option>
                                        @for ($class = 6; $class <= 12; $class++)
                                            <option value="{{ $class }}" {{ old('class_name', $student->class_name) == $class ? 'selected' : '' }}>{{ $class }}-শ্রেণী</option>
                                        @endfor
                                        <option value="901">9(Voc)</option>
                                        <option value="101">10(Voc)</option>
                                        <option value="111">11(Voc)</option>
                                        <option value="121">12(Voc)</option>
                                    </select>
                                    @error('class_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>                    
                            </div>
                            
                        </div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="gov_stipend_male" class="text-info">সরকারী বৃত্তি প্রাপ্ত ছাত্র</label>
                                    <input type="number" class="form-control @error('gov_stipend_male') is-invalid @enderror" id="gov_stipend_male" name="gov_stipend_male" value="{{ old('gov_stipend_male', $student->gov_stipend_male) }}" required min="0" max="9999">
                                    @error('gov_stipend_male')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> 
                            
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="sub_stipend_male" class="text-info">উপবৃত্তি প্রাপ্ত ছাত্র</label>
                                    <input type="number" class="form-control @error('sub_stipend_male') is-invalid @enderror" id="sub_stipend_male" name="sub_stipend_male" value="{{ old('sub_stipend_male', $student->sub_stipend_male) }}" required min="0" max="9999">
                                    @error('sub_stipend_male')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="gov_stipend_female" class="text-info">সরকারী বৃত্তি প্রাপ্ত ছাত্রী</label>
                                    <input type="number" class="form-control @error('gov_stipend_female') is-invalid @enderror" id="gov_stipend_female" name="gov_stipend_female" value="{{ old('gov_stipend_female', $student->gov_stipend_female) }}" required min="0" max="9999">
                                    @error('gov_stipend_female')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                                
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="sub_stipend_female" class="text-info">উপবৃত্তি প্রাপ্ত ছাত্রী</label>
                                    <input type="number" class="form-control @error('sub_stipend_female') is-invalid @enderror" id="sub_stipend_female" name="sub_stipend_female" value="{{ old('sub_stipend_female', $student->sub_stipend_female) }}" required min="0" max="9999">
                                    @error('sub_stipend_female')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <a class="btn btn-warning form-control" href="{{ route('backend.stipend_students') }}">ফিরে যান</a>
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



