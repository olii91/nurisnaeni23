@extends('adminlte::page')
@section('title', 'Halaman User')
@section('content_header')
   <h1 class="m-0 text-dark">Masyarakat</h1>
@stop
@section('link')
<li class="breadcrumb-item active">Masyarakat</li>
@stop

@section('content')
<div class="card">
   <div class="card-body">
       @if (session('status'))
           <x-adminlte-alert theme="success" title="Sukses">
               {{session('status')}}
           </x-adminlte-alert>
       @endif
       @if ($errors->any())
           <x-adminlte-alert theme="success" title="Sukses">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </x-adminlte-alert>
       @endif
       <a href="{{route('masyarakat.create')}}" class="btn btn-md btn-success mx-1 shadow"> <i class="fa fa-lg fa-fw fa-plus"></i> Tambah Masyarakat</a>
       <br/> <br/>
       <div class="table-responsive">
           <table id="tabel_user" class="table table-striped table-hover table-condensed table-bordered">
               <thead>
                   <tr style="background-color: darkgrey">
                       <th>Nik</th>
                       <th>Nama</th>
                       <th>Username</th>
                       <th>password</th>
                       <th>Telp</th>
                       <th class="text-center" width="70">Aksi</th>
                   </tr>
               </thead>
               <tbody>
               @foreach($masyarakat as $masyarakat)
                   <tr>
                       <td>{{$loop->iteration}}</td>
                       <td>{{$masyarakat->nik}}</td>
                       <td>{{$masyrakat->nama}}</td>
                       <td>{{$masyarakat->username}}</td>
                       <td>{{$masyarakat->password}}</td>
                       <td>{{$masyarakat->telp}}</td>
                           <td>
                               <a href="{{route('masyarakat.edit',$user->id)}}" class="btn btn-sm btn-primary"
                                   title="Edit"><i class="far fa-edit"></i>Edit</a>
                                   <x-adminlte-button class="btn btn-sn btn-danger" label="Delete" data-toggle="modal" data-target="#hapusmasyarakat{{$loop->iteration}}" icon="far fa-trash-alt" class="bg-danger"> Hapus </x-adminlte-button>
                                       {{-- Custom --}}
                                   <x-adminlte-modal id="hapusmasyarakat{{$loop->iteration}}" title="Hapus Masyarakat" size="md" theme="orange"
                                   icon="fas fa-bell" v-centered static-backdrop scrollable>
                                   <div style="height:50px;">
                                       <form action="{{route('masyarakat.delete',$user->id)}}" method="POST">
                                           @csrf
                                           @method('DELETE')
                                             Apakah anda yakin akan menghapus masyarakat ini?</div>
                                   <x-slot name="footerSlot">
                                       <x-adminlte-button type="submit" class="mr-auto" theme="primary" label="Hapus"/>
                                       <x-adminlte-button theme="danger" label="Batal" data-dismiss="modal"/>
                                       </form>
                                   </x-slot>
                                   </x-adminlte-modal>
                           </td>
                

                         </tr>
                       @endforeach
               </tbody>
           </table>
       </div>
   </div>
</div>
@stop
@section('plugins.Datatables', true)
@section('js')
   <script> $('#tabel_user').DataTable();</script>
@stop