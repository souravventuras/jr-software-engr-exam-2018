<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
        .margin-20{
            margin: 20px 20%;
        }
        input{
            width: 350px !important;
        }

        select{
            width: 100px !important;
        }
    </style>
</head>
<body>
    <div class="container margin-20">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('search') }}" class="form-inline">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control" name="main_search" id="main_search" placeholder="search language or programming languages" value="{{ $main_search }}">
                    </div>
                    <div class="form-group">
                        <select name="programming_lang_search" class="form-control">
                            <option value="">Select Programming Language</option>
                            @foreach($programming_languages as $plang) 
                                <option value="{{ $plang->id }}" {{ $plang->id== $programming_lang_search ? 'selected':'' }}>{{ $plang->name }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="lang_search" class="form-control">
                            <option value="">Select Language</option>
                            @foreach($languages as $lang) 
                                <option value="{{ $lang->id }}" {{ $lang->id== $lang_search ? 'selected':'' }}>{{ $lang->code }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info mb-2">Search</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Email</th>
                            <th class="text-center">Programming Language</th>
                            <th class="text-center">Language</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(sizeof($developers))
                            @foreach($developers as $developer)
                                <tr>
                                    <td>{{ $developer->email }}</td>
                                    <td>
                                        
                                        @if(sizeof($developer->programmingLanguages))
                                            @foreach($developer->programmingLanguages as $programmingLanguage)
                                                {{ $programmingLanguage->name }}, 
                                            @endforeach
                                        @else
                                        -
                                        @endif

                                    </td>
                                    <td>
                                       @if(sizeof($developer->languages))
                                            @foreach($developer->languages as $language)
                                                {{ $language->code }}, 
                                            @endforeach
                                        @else
                                        -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        @else
                        <tr>
                            <td class="text-center" colspan="4">No Data Found</td>
                        </tr>
                        @endif
                        
                    </tbody>
                </table>
                {{-- <div class="justify-content-center">
                    {{ $developers->links() }}
                </div> --}}
            </div>
        </div>
        
    </div>
</body>
</html>