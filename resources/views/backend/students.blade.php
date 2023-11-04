@extends('backend.layouts.back_app')

@section('content')


<style>
    .page-title {
        text-align: left;
        margin: 20px 0 10px 0;
    }

    .add-button {
        text-align: right;
        margin: 20px 0 10px 0;
    }

    @media (max-width: 768px) {
        .page-title {
            text-align: center;
            margin: 20px 0 10px 0;
        }

        .add-button {
            text-align: center;
            margin: 0 0 10px 0;
        }
    }

</style>


<main>
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-6 col-12 page-title">
                <h1 class="text-danger">শ্রেণী ভিত্তিক ছাত্র-ছাত্রী ম্যানেজমেন্ট</h1>
            </div>

            <div class="col-md-6 col-12 add-button">
                {{-- <a style="margin-bottom: 20px;" class="btn btn-primary" href="">নতুন নোটিশ যুক্ত করুন</a> --}}
                <button style="margin-bottom: 20px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#classAddModal">
                    নতুন শ্রেণী যুক্ত করুন
                </button>
            </div>
        </div>

        <div class="col-md-6 offset-md-3">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <script>
            $(document).ready(function() {
                $('.alert').delay(2000).fadeOut(500);
            });
        </script>               

        <table class="table table-responsive table-bordered text-center">
            <colgroup>
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
            </colgroup>
            <thead>
                <tr>
                    <th>ক্রম</th>
                    <th>শ্রেণী</th>
                    <th>শাখা</th>
                    <th>ছাত্র</th>
                    <th>ছাত্রী</th>
                    <th>মুসলিম</th>
                    <th>হিন্দু</th>
                    <th>বৌদ্ধ</th>
                    <th>মোট</th>
                    <th>একশন</th>
                </tr>
            </thead>

            <tbody>
                @forelse($students as $item)
                    @php
                        $total = $item->male_students + $item->female_students;
                        $muslim = $total - $item->hindu_students - $item->buddhist_students;
                    @endphp
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $item->class_name }}</td>
                        <td class="align-middle">{{ $item->class_section }}</td>
                        <td class="align-middle">{{ $item->male_students }}</td>
                        <td class="align-middle">{{ $item->female_students }}</td>
                        <td class="align-middle">{{ $muslim }}</td>
                        <td class="align-middle">{{ $item->hindu_students }}</td>
                        <td class="align-middle">{{ $item->buddhist_students }}</td>
                        <td class="align-middle">{{ $total }}</td>
                        {{-- <td class="align-middle">{{ $item->user->name }}</td> --}}
                        <td class="align-middle">
                            <a href="#" class="btn my-1 btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editStudentModal{{ $item->id }}" data-student="{{ json_encode($item) }}">Edit</a>

                            <a href="#" class="btn my-1 btn-sm btn-danger" onclick="showConfirmationModal({{ $item->id }})">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-danger fw-bold" colspan="9">এই পর্যন্ত কোন ছাত্র যোগ করা হয়নি।</td>
                    </tr>
                @endforelse
            </tbody>            

            <script>
                function showConfirmationModal(itemId) {
                    if (confirm('আপনি কি নিশ্চিত যে আপনি এই শ্রেণীটি ডিলিট করতে চান?')) {
                        // If the user confirms, redirect to the delete route
                        window.location.href = "{{ route('backend.delete_students', '') }}" + '/' + itemId;
                    }
                }
            </script>
        </table>
    </div>
</main>
@endsection

<!-- Add Modal -->
<div class="modal fade" id="classAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">নতুন শ্রেণী যুক্ত করুন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('backend.add_students') }}" method="POST" id="notice" enctype="multipart/form-data">
                    @csrf
                
                    <div class="form-group mb-4">
                        <label for="className">শ্রেণী</label>
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

                    <div class="form-group mb-4">
                        <label for="classSection">শাখা</label>
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="maleStudents">ছাত্র</label>
                                <input type="number" class="form-control @error('maleStudents') is-invalid @enderror" id="maleStudents" name="maleStudents" value="{{ old('maleStudents', 0) }}" required min="0" max="9999">
                                @error('maleStudents')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                                        
                    
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="femaleStudents">ছাত্রী</label>
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
                                <label for="hinduStudents">হিন্দু</label>
                                <input type="number" class="form-control @error('hinduStudents') is-invalid @enderror" id="hinduStudents" name="hinduStudents" value="{{ old('hinduStudents', 0) }}" required min="0" max="9999">
                                @error('hinduStudents')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="buddistStudents">বৌদ্ধ</label>
                                <input type="number" class="form-control @error('buddistStudents') is-invalid @enderror" id="buddistStudents" name="buddistStudents" value="{{ old('buddistStudents', 0) }}" required min="0" max="9999">
                                @error('buddistStudents')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Add a Notice" class="btn btn-success">
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editStudentModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">শ্রেণী আপডেট যুক্ত করুন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('backend.update_students', $item->id) }}" method="POST" id="notice" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-4">
                        <label for="className">শ্রেণী</label>
                        <select class="form-control @error('className') is-invalid @enderror" id="className" name="className" required>
                            <option value="">শ্রেণী নির্বাচন করুন</option>
                            @for ($class = 6; $class <= 12; $class++)
                                <option value="{{ $class }}" {{ old('className', $item->class_name) == $class ? 'selected' : '' }}>{{ $class }}-শ্রেণী</option>
                            @endfor
                        </select>
                        @error('className')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="classSection">শাখা</label>
                        <select class="form-control @error('classSection') is-invalid @enderror" id="classSection" name="classSection" required>
                            <option value="">শাখা নির্বাচন করুন</option>
                            <option value="A" {{ old('classSection', $item->class_section) == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ old('classSection', $item->class_section) == 'B' ? 'selected' : '' }}>B</option>
                            <option value="C" {{ old('classSection', $item->class_section) == 'C' ? 'selected' : '' }}>C</option>
                            <option value="D" {{ old('classSection', $item->class_section) == 'D' ? 'selected' : '' }}>D</option>
                            <option value="Computer" {{ old('classSection', $item->class_section) == 'Computer' ? 'selected' : '' }}>Computer</option>
                            <option value="Civil" {{ old('classSection', $item->class_section) == 'Civil' ? 'selected' : '' }}>Civil</option>
                        </select>
                        @error('classSection')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="maleStudents">ছাত্র</label>
                                <input type="number" class="form-control @error('maleStudents') is-invalid @enderror" id="maleStudents" name="maleStudents" value="{{ old('maleStudents', $item->male_students) }}" required min="0" max="9999">
                                @error('maleStudents')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="femaleStudents">ছাত্রী</label>
                                <input type="number" class="form-control @error('femaleStudents') is-invalid @enderror" id="femaleStudents" name="femaleStudents" value="{{ old('femaleStudents', $item->female_students) }}" required min="0" max="9999">
                                @error('femaleStudents')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="hinduStudents">হিন্দু</label>
                                <input type="number" class="form-control @error('hinduStudents') is-invalid @enderror" id="hinduStudents" name="hinduStudents" value="{{ old('hinduStudents', $item->hindu_students) }}" required min="0" max="9999">
                                @error('hinduStudents')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="buddistStudents">বৌদ্ধ</label>
                                <input type="number" class="form-control @error('buddistStudents') is-invalid @enderror" id="buddistStudents" name="buddistStudents" value="{{ old('buddistStudents', $item->buddhist_students) }}" required min="0" max="9999">
                                @error('buddistStudents')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Edit Student" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    $('#editStudentModal{{ $item->id }}').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var studentData = JSON.parse(button.data('student'));
        var modal = $(this);

        // Populate the modal form with existing student data
        modal.find('#className').val(studentData.class_name);
        modal.find('#classSection').val(studentData.class_section);
        modal.find('#maleStudents').val(studentData.male_students);
        modal.find('#femaleStudents').val(studentData.female_students);
        modal.find('#hinduStudents').val(studentData.hindu_students);
        modal.find('#buddistStudents').val(studentData.buddhist_students);
    });
</script> --}}

