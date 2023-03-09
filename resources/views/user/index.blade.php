@extends('adminlte::page')

@section('content')
<div class="card">
    <div class="card-header">{{ __('User') }}</div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <a href="{{route('user.create')}}" class="btn btn-md btn-success mx-1 shadow"> <i class="fa fa-lg fa-fw fa-plus"></i> Tambah User</a>
        <br/><br/>
        <div class="table-responsive">
            <table id="tabel_user" class="table-striped table_hover table-condensed table-bordered">
                <thead>
                    <tr style="background-color:darkgray">
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th class="text-center" width="70">Aksi</th>
                    </tr>
                </thead>
            </tbody>
            @foreach ($user as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->level}}</td>
                        <td>
                            <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-primary"
                                title="Edit"><i class="far fa-edit"></i>Edit</a>
                                <x-adminlte-button class="btn btn-sm btn-danger" label="Delete" data-toggle="modal" data-target="#hapususer{{$loop->iteration}}" icon="far fa-trash-alt" class="bg-danger">Hapus</x-adminlte-button>
                                    {{-- Custom --}}
                                <x-adminlte-modal id="hapususer{{$loop->iteration}}" title="Hapus User" size="md" theme="yellow"
                                    icon="fas fa-bell" v-centered static-backdrop scrollable>
                                    <div style="height:50px;">
                                        <form action="{{route('user.delete',$user->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                Apakah anda yakin akan menghapus user ini?</div>
                                <x-slot name="footerSlot">
                                <x-adminlte-button type="submit"class="mr-auto" theme="primary" label="Hapus"/>
                                <x-adminlte-button theme="danger"label="Batal" data-dismiss="modal"/>
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
{{-- @section('plugins.Datatables', true)
@section('js')
<script> $('#tabel_user').DataTable();</script>
@stop
                                <button class="btn btn-sm btn-danger" title="Delete"
                                data-toggle="modal" data-target="#modal-delete{{$loop->iteration}}">
                                    Hapus
                                </button>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
                         --}}
