<div>
    <form action="{!! URL::to('developers') !!}">
        <div>


            <label for="pro_lang">
                Select Languages
            </label>
            <select name="pro_lang" id="pro_lang">
                <option value="">Select Programming language</option>
                @foreach($programming_languages as $programming_language)
                    <option value="{{$programming_language->name}}">{{$programming_language->name}}</option>
                @endforeach
            </select>

            <label for="lang">
                Select Languages
            </label>
            <select name="lang" id="lang">
                <option value="">Select language</option>
                @foreach($languages as $language)
                    <option value="{{$language->code}}">{{$language->code}}</option>
                @endforeach
            </select>
            <button type="submit">Go</button>
        </div>

    </form>
</div>

<table border="1px solid #000" cellpadding="10" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th bgcolor="#a9a9a9" colspan="3"><p>Developers</p></th>
    </tr>
    <tr>
        <th>Email</th>
        <th>Programming Languages</th>
        <th>Languages</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($developers) && !empty($developers))
        @foreach($developers as $developer)
            <tr>
                <td align="center">{{$developer->email}}</td>
                <td align="center"> {{$developer->programming_language_names}}</td>
                <td align="center">{{$developer->languages}}</td>

            </tr>
        @endforeach
    @endif
    </tbody>
</table>