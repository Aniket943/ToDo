<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TODO LIST') }}
        </h2>
    </x-slot>

    <div class="py-0">
        <section class="vh-100" >

            <div class="row justify-content-center align-items-center h-100">
                <div class="col col-8">
                    <div class="card rounded-3">
                        <div class="card-body p-4">

                            @if(session()->has('success'))
                                <div class="alert alert-success">{{session()->get('success')}}</div>
                            @endif

                            @if(session()->has('error'))
                                <div class="alert alert-danger">{{session()->get('error')}}</div>
                            @endif
                            <h4 class="text-center my-3 pb-3">To Do App</h4>
                            <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2"
                                method="post" action="{{ ($id > 0)? Route('todolist.update', $id) : Route('todolist.add') }}">
                                @csrf
                                <div class="col-12">
                                    <div class="form-outline">
                                        <input type="text" id="task_desc" name="task_desc" class="form-control" value= "{{ !empty($list_details) ? $list_details->discription : '' }}"
                                            placeholder="Enter a task here" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">{{ ($id > 0)? 'Update' : 'Save' }}</button>
                                </div>

                            </form>

                            <table class="table table-striped table-bordered mb-4">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Todo item</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($list_items as $index => $list)
                                    <tr>
                                        <th scope="row">{{ $list_items->firstItem()+$loop->index }}</th>
                                        <td>{{ $list->discription }}</td>
                                        <td>{{ ($list->mark_as_completed == 1) ? 'Completed' : 'In progress' }}</td>
                                        <td>
                                        @if ($list->mark_as_completed != 1)
                                            <a href="{{ Route('todolist.edit', $list->id) }}" class="btn btn-primary" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        @endif
                                            <a href="{{ Route('todolist.delete', $list->id) }}" class="btn btn-danger" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        @if ($list->mark_as_completed != 1)
                                            <a href="{{ Route('todolist.markcompleted', $list->id) }}" class="btn btn-success" title="Mark AS Completed"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
                                        @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $list_items->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
</x-app-layout>
