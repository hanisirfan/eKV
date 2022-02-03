@extends('dashboard.layout.admin')
@section('content')
    <div class="w-100 h-100 mt-3">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-lg-10">
                <form action="" method="post" class="mt-3 mb-5">
                    @csrf
                    <h2>Kemas Kini Sesi Pendaftaran Semester</h2>
                    @if(session()->has('semesterRegistrationSessionUpdateSuccess'))
                        <div class="alert alert-success">{{ session('semesterRegistrationSessionUpdateSuccess') }}</div>
                    @endif
                    @error('existed')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('not_existed')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('course_set')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @php
                        if(!empty(old('course_set_id'))){
                            $courseSetID = old('course_set_id');
                        }elseif(!empty($semesterSession->course_sets_id)){
                            $courseSetID = $semesterSession->course_sets_id;
                        }else{
                            $courseSetID = '';
                        }
                    @endphp
                    <div class="form-floating mb-3">
                        <input type="text" name="course_set_id" id="course_set_id" class="form-control" placeholder="course_set_id" value="{{ $courseSetID }}">
                        <label for="course_set_id" class="form-label">ID Set Kursus</label>
                        @error('course_set_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select name="session" id="session" class="form-select">
                            {{-- Continue here --}}
                            @foreach ($sessions as $session)
                                @if (!empty(old('session')))
                                    @if(old('session') == $session)
                                        <option value="{{ $session }}" selected>{{ strtoupper($session) }}</option>
                                    @else
                                        <option value="{{ $session }}">{{ strtoupper($session) }}</option>
                                    @endif
                                @elseif (!empty($semesterSession->session))
                                    @if ($semesterSession->session == $session)
                                        <option value="{{ $session }}" selected>{{ strtoupper($session) }}</option>
                                    @else
                                        <option value="{{ $session }}">{{ strtoupper($session) }}</option>
                                    @endif
                                @else
                                    <option value="{{ $session }}">{{ strtoupper($session) }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="session" class="form-label">Sesi</label>
                        @error('session')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select name="year" id="year" class="form-select">
                            @foreach ($years as $year)
                                @if (!empty(old('year')))
                                    @if(old('year') == $year)
                                        <option value="{{ $year }}" selected>{{ strtoupper($year) }}</option>
                                    @else
                                        <option value="{{ $year }}">{{ strtoupper($year) }}</option>
                                    @endif
                                @elseif (!empty($semesterSession->year))
                                    @if ($semesterSession->year == $year)
                                        <option value="{{ $year }}" selected>{{ strtoupper($year) }}</option>
                                    @else
                                        <option value="{{ $year }}">{{ strtoupper($year) }}</option>
                                    @endif
                                @else
                                    <option value="{{ $year }}">{{ strtoupper($year) }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="year" class="form-label">Tahun</label>
                        @error('year')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select name="status" id="status" class="form-select">
                            @if (!empty(old('status')))
                                @switch(old('status'))
                                    @case('open')
                                        <option value="open" selected>Buka</option>
                                        <option value="close">Tutup</option>
                                        @break
                                    @case('close')
                                        <option value="open">Buka</option>
                                        <option value="close" selected>Tutup</option>
                                        @break
                                    @default
                                        <option value="open" selected>Buka</option>
                                        <option value="close">Tutup</option>
                                @endswitch
                            @elseif (!empty($semesterSession->status))
                                @switch($semesterSession->status)
                                    @case('open')
                                        <option value="open" selected>Buka</option>
                                        <option value="close">Tutup</option>
                                        @break
                                    @case('close')
                                        <option value="open">Buka</option>
                                        <option value="close" selected>Tutup</option>
                                        @break
                                    @default
                                        <option value="open" selected>Buka</option>
                                        <option value="close">Tutup</option>
                                @endswitch
                            @else
                                <option value="open" selected>Buka</option>
                                <option value="close">Tutup</option>
                            @endif
                        </select>
                        <label for="status" class="form-label">Status</label>
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100 hvr-shrink" name="info">Kemas Kini</button>
                </form>
            </div>
        </div>
    </div>
@endsection
