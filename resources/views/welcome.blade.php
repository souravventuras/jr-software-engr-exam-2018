@extends('layouts.app')

@section('content')
    <br>
    <div class="card">
        <div class="card-body">
            <form id="developer_search" action="">
                <div class="row">
                    <div class="col-md-6">
                        <select name="programming_language" id="programming_language" class="form-control">
                            <option value="">Search by programming language </option>
                            @foreach($programming_languages as $programming_language)
                                <option {{request('programming_language') === $programming_language->name ? 'selected' : '' }} value="{{$programming_language->name}}">{{$programming_language->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <select name="language" id="language" class="form-control">
                            <option value="">Search by language</option>
                            @foreach($languages as $language)
                                <option {{request('language') === $language->code ? 'selected' : '' }} value="{{$language->code}}">{{$language->code}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>

    <div class="card">
        <div class="card-body">
            @if(count($developers) > 0)
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Programming Language</th>
                    <th scope="col">Language</th>
                </tr>
                </thead>
                <tbody>
                @foreach($developers as $data)
                    <tr>
                        <th scope="row">{{$data->id}}</th>
                        <td>{{$data->email}}</td>
                        <td>{{$data->programmingLanguage->pluck('name')->implode(',')}}</td>
                        <td>{{$data->language->pluck('code')->implode(',')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
               <h3 class="text-center">No Search Result Found !</h3>
            @endif
        </div>
    </div>


@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#programming_language').on('change', function () {
                $('#developer_search').submit();
            });
            $('#language').on('change', function () {
                $('#developer_search').submit();
            });
        });
    </script>
@endpush