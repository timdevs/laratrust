@extends('laratrust::panel.layout')

@section('title', 'Roles')

@section('content')
  <div class="flex flex-col">
    <a
      href="{{route('laratrust.roles.create')}}"
      class="self-end bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
    >
      + New Role
    </a>
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
      <div class="mt-4 align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        <table class="min-w-full">
          <thead>
            <tr>
              <th class="th">Id</th>
              <th class="th">Display Name</th>
              <th class="th">Name</th>
              <th class="th"># Permissions</th>
              <th class="th"></th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @foreach ($roles as $role)
            <tr>
              <td class="td text-sm leading-5 text-gray-900">
                {{$role->id}}
              </td>
              <td class="td text-sm leading-5 text-gray-900">
                {{$role->display_name}}
              </td>
              <td class="td text-sm leading-5 text-gray-900">
                {{$role->name}}
              </td>
              <td class="td text-sm leading-5 text-gray-900">
                {{$role->permissions_count}}
              </td>
              <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                <a href="{{route('laratrust.roles.edit', $role->id)}}" class="text-blue-600 hover:text-blue-900">Edit</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  {{ $roles->links('laratrust::panel.pagination') }}
@endsection