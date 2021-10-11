@extends('layouts.header')

@section('content')
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                              <div class="module-body">
                                 <form class="form-horizontal row-fluid" action="{{url('/siswa/update/'.$dt->id)}}" method="POST">
                                    @csrf
                                    <div class="modal-body">

                                   <div class="control-group">
                                        <label class="control-label" for="basicinput">Nama Siswa</label>
                                          <div class="controls">
                                            <input type="text" name="nama_siswa" id="basicinput" placeholder="Nama Siswa" class="span8" value="{{$dt->nama_siswa}}">
                                                         <!--  <span class="help-inline">Minimum 5 Characters</span> -->
                                            </div>
                                        </div>
                                        <div class="control-group">
                                        <label class="control-label" for="basicinput">Nis Siswa</label>
                                          <div class="controls">
                                            <input type="text" readonly id="basicinput" placeholder="Nama Siswa" class="span8" value="{{$dt->nis}}">
                                                          <span class="help-inline">Digunakan untuk login user : nis dan pass : nis</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="basicinput"> Jurusan - Tingkat - Kelas</label>
                                            <div class="controls">
                                              <select tabindex="1" name="id_kelas" data-placeholder="Select here.." class="span8">
                                                <option value="0">Pilih Kelas</option>
                                                  @foreach($kelas as $pd)
                                                 <option value="{{$pd->id}}"
                                                  {{$dt->id_kelas==$pd->id?'selected':''}}
                                                  >{{$pd->nama_kelas}} - {{$pd->nama_jurusan}} - {{$pd->tingkat}} - {{$pd->nama_kelas}}</option>
                                                 @endforeach
                                                </select>
                                              </div>
                                          </div>
                                    </div>

                                   <div class="control-group">
                                    <div class="controls">
                                      <a href="{{url('siswa')}}" class="btn btn">Kembali</a>
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
