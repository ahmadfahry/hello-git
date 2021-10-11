@extends('layouts.header')

@section('content')
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                              <div class="module-body">
                                 <form class="form-horizontal row-fluid" action="{{url('/guru/update/'.$dt->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                            <div class="control-group">
                                          <label class="control-label" for="basicinput">Nama guru</label>
                                            <div class="controls">
                                              <input type="text" name="nama_guru" id="basicinput" placeholder="Nama Guru class="span8" value="{{$dt->nama_guru}}">
                                                           <!--  <span class="help-inline">Minimum 5 Characters</span> -->
                                              </div>
                                          </div>
                                          <div class="control-group">
                                          <label class="control-label" for="basicinput">Nip guru</label>
                                            <div class="controls">
                                              <input type="text" name="nip" id="basicinput" placeholder="Nip guru" class="span8" value="{{$dt->nip}}">
                                                           <!--  <span class="help-inline">Minimum 5 Characters</span> -->
                                              </div>
                                          </div>
                                           <div class="control-group">
                                          <label class="control-label" for="basicinput">Foto Guru</label>
                                            <div class="controls">
                                              <input type="file" name="foto_guru" id="basicinput" placeholder="" class="span8">
                                                           <!--  <span class="help-inline">Minimum 5 Characters</span> -->
                                              </div>
                                               <div class="controls">
                                              <img src="{{$dt->foto_guru}}" style="width: 20%" align="center">
                                            </div>
                                              <input type="hidden" name="old_foto" value="{{$dt->foto_dosen}}">
                                          </div>
                                    </div>

                                   <div class="control-group">
                                    <div class="controls">
                                      <a href="{{url('guru')}}" class="btn btn">Kembali</a>
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
