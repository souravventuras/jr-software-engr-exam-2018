<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<developer>
    <id>{{$developer->id}}</id>
    <email>{{$developer->email}}</email>
    <created_at>{{$developer->created_at}}</created_at>
    <updated_at>{{$developer->updated_at}}</updated_at>
    @foreach($developer->language as $language)
    <language>
        <id>{{$language->id}}</id>
        <code>{{$language->code}}</code>
        <created_at>{{$language->created_at}}</created_at>
        <updated_at>{{$language->updated_at}}</updated_at>
        <pivot>
            <developer_id>{{$language->pivot->developer_id}}</developer_id>
            <language_id>{{$language->pivot->language_id}}</language_id>
        </pivot>
    </language>
    @endforeach
    @foreach($developer->programmingLanguage as $programmingLanguage)
        <programming_language>
            <id>{{$programmingLanguage->id}}</id>
            <name>{{$programmingLanguage->name}}</name>
            <created_at>{{$programmingLanguage->created_at}}</created_at>
            <updated_at>{{$programmingLanguage->updated_at}}</updated_at>
            <pivot>
                <developer_id>{{$programmingLanguage->pivot->developer_id}}</developer_id>
                <programming_language_id>{{$programmingLanguage->pivot->programming_language_id}}</programming_language_id>
            </pivot>
        </programming_language>
    @endforeach
</developer>