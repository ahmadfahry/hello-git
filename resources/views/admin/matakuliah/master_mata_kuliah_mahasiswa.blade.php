@extends('layouts.header')

@section('content')
@php $model = new App\Models\User() @endphp
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                                <div class="module-head">
                                  <a style="float: right;" class="btn btn-small btn-info"
                                     href="{{url('/matapelajran/list/rapor/cetak/'.$sis->id)}}" ><i class="icon-file"></i> Cetak rapor</a>
                                  <h3>List Mata Pelajaran</h3>
                                   @if($message=Session::get('success'))
                            <div class="alert bg-teal" role="alert">
                                <em class="fa fa-lg fa-check">&nbsp;</em> 
                               <p style="color: green">{{$message}}</p>
                            </div>
                            @endif
                             @if($message=Session::get('danger'))
                            <div class="alert bg-teal" role="alert">
                                <em class="fa fa-lg fa-check">&nbsp;</em> 
                               <p style="color: red">{{$message}}</p>
                            </div>
                            @endif
                                </div>
                              <div class="module-body">
                                 <form class="form-horizontal row-fluid" method="POST"  enctype="multipart/form-data" action="{{url('/matapelajaran/rapor/')}}">
                                    @csrf
                                    <div class="modal-body">
                                      <div class="control-group">
                                      <label class="control-label">Mata Kuliah</label>
                                      <input type="hidden" name="id_siswa" value="{{$sis->id}}">
                                      <div class="controls">
                                        @foreach($data as $dt)
                                        @php $chek = $model->cekMp($dt->id_matapelajaran,$sis->id) @endphp
                                        <label class="checkbox">
                                          <input type="checkbox" name="id_mata_pelajaran[]" 
                                          value="{{$dt->id_matapelajaran}}" {{$chek == 'ada'?'checked':''}}>
                                          {{$dt->nama_mata_pelajaran}}
                                        </label>
                                        @endforeach
                                      </div>
                                    </div>
                                    </div>

                                   <div class="control-group">
                                    <div class="controls">
                                      <a href="{{url('home')}}" class="btn btn">Kembali</a>
                                      <button type="submit" class="btn btn-info">Update</button>
                                    </div>
                                  </div>
                                    </form>
                              </div>
                        </div><!--/.module-->
                    </div>
                </div>
                    <!--/.span9-->


                    <!-- Modal -->
@endsection
