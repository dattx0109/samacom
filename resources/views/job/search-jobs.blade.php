@extends('layouts.base')

@section('content')
        <div class="col-sm-10 col-sm-offset-1">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="search-form">
                        <form action="{{url('/danh-sach-cong-viec')}}" method="get">
                            <div class="input-group">
                                <input type="text" placeholder="Nhân viên bán hàng" name="search" class="form-control input-lg">
                                <div class="input-group-btn">
                                    <button class="btn btn-lg btn-primary" type="submit">
                                        Tìm kiếm
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br/>
                    <div class="ibox-content">
                        <div class="text-right domainJobFilter__resultText"> Số kết quả tìm kiếm:
                            <b>{{$dataSearch->total()}}</b></div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tên công việc</th>
                                    <th>Địa điểm làm việc</th>
                                    <th>Ngày hết hạn</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1 ?>
                                @foreach($dataSearch as $listSearch)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                            <a href="/cong-viec/{{$listSearch->id}}">
                                                {{isset($listSearch->job_name)?$listSearch->job_name:''}}
                                            </a>
                                        </td>
                                        <td>{{isset($listSearch->workplace)?$listSearch->workplace:''}}</td>
                                        <td>{{isset($listSearch->date_expired)?$listSearch->date_expired:''}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                            {{ $dataSearch->appends(['search' => request()->search])->links() }}
                    </div>
                </div>
            </div>
        </div>
@endsection
