@extends('dashboard.layout.admin')
@section('content')
    <div class="w-100 h-100 mt-3">
        <div class="row text-center">
            <h1>Senarai Set Kursus</h1>
        </div>
        <div class="row d-flex justify-content-center align-items-center mb-5">
            <div class="row d-flex justify-content-center align-items-center col-12 col-lg-10">
                <div class="row d-flex justify-content-center align-content-center mt-3">
                    <form action="" method="get" class="row">
                        <div class="row row-cols-1 row-cols-md-2">
                            <div class="col mb-2">
                                <div class="form-floating">
                                    <select class="form-select" id="sort_by" name="sort_by" aria-label="sortby">
                                        <option value="id">ID</option>
                                        <option value="study_levels_code">Kod Tahap Pengajian</option>
                                        <option value="programs_code">Kod Program</option>
                                        <option value="semester">Semester</option>
                                    </select>
                                    <label for="sort_by">Susun Mengikut:</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="sort_order" name="sort_order" aria-label="sortorder">
                                        <option value="asc">Meningkat</option>
                                        <option value="desc">Menurun</option>
                                    </select>
                                    <label for="sort_order">Susunan:</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-7 col-md-10">
                                <input type="text" class="form-control" name="search" placeholder="Carian">
                            </div>
                            <div class="col-5 col-md-2">
                                <button type="submit" class="btn btn-primary hvr-shrink w-100"><i class="bi bi-search" style="margin-right: 1rem;"></i>Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
                @if(isset($filterAndSearch))
                    <div class="row d-flex justify-content-center align-content-center mt-3">
                        <div class="row">
                            <p class="text-center fw-bold">Hasil Carian</p>
                        </div>
                        <div class="row">
                            @if($filterAndSearch['sortBy'] != NULL AND $filterAndSearch['sortOrder'] != NULL)
                                <div class="col-6">
                                    @if($filterAndSearch['sortBy'] == 'id')
                                        <p>Susun Mengikut: <span class="fst-italic">ID</span></p>
                                    @elseif($filterAndSearch['sortBy'] == 'study_levels_code')
                                        <p>Susun Mengikut: <span class="fst-italic">Kod Tahap Pengajian</span></p>
                                    @elseif($filterAndSearch['sortBy'] == 'programs_code')
                                        <p>Susun Mengikut: <span class="fst-italic">Kod Program</span></p>
                                    @elseif($filterAndSearch['sortBy'] == 'semester')
                                        <p>Susun Mengikut: <span class="fst-italic">Semester</span></p>
                                    @endif
                                </div>
                                <div class="col-6">
                                    @if($filterAndSearch['sortOrder'] == 'asc')
                                        <p>Susunan: <span class="fst-italic">Meningkat</span></p>
                                    @elseif($filterAndSearch['sortOrder'] == 'desc')
                                        <p>Susunan: <span class="fst-italic">Menurun</span></p>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            @if($filterAndSearch['search'] != NULL)
                                <p>Hasil carian bagi: <span class="fst-italic">{{ $filterAndSearch['search'] }}</span></p>
                            @endif
                        </div>
                    </div>
                @endif
                @if(session()->has('deleteSuccess'))
                    <div class="row d-flex justify-content-center align-content-center mt-3">
                        <div class="col-11 col-lg-11 alert alert-success">{{ session('deleteSuccess') }}</div>
                    </div>
                @endif
                @if($course->count() < 1)
                    <div class="row d-flex justify-content-center align-content-center mt-3">
                        <p class="text-center mt-3 fs-5">Tiada rekod dijumpai.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered border-secondary text-center mt-3">
                            <thead class="table-dark">
                                <tr>
                                    @if(session()->has('successRemove'))
                                        <div class="alert alert-success">{{ session('successRemove') }}</div>
                                    @endif
                                    <th class="col-2">ID</th>
                                    <th class="col-2">TAHAP PENGAJIAN</th>
                                    <th class="col-2">PROGRAM</th>
                                    <th class="col-2">SEMESTER</th>
                                    <th class="col-2">KEMAS KINI</th>
                                    <th class="col-1">BUANG</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($course as $c)
                                    <tr>
                                        <td>{{ strtoupper($c->id) }}</td>
                                        <td>{{ strtoupper($c->study_levels_code) }}</td>
                                        <td>{{ strtoupper($c->programs_code) }}</td>
                                        <td>{{ strtoupper($c->semester) }}</td>
                                        <td>
                                            <a class="btn btn-primary hvr-shrink" href="{{ route('admin.course.set.update', ['id' => strtolower($c->id)]) }}"><i class="bi bi-pencil-square"></i></a>
                                        </td>
                                        <td>
                                            <!-- Delete Static Backdrop Confirmation -->
                                            @php
                                                $deleteFormData = [array("nameAttr" => "id", "valueAttr" => strtolower($c->id))];
                                            @endphp
                                            <x-delete-confirmation name="set kursus" :formData="$deleteFormData" :increment="$i"/>
                                            <x-delete-confirmation-button :increment="$i"/>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $course->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
