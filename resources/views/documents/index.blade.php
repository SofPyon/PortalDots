@extends('layouts.app')

@section('no_circle_selector', true)

@section('title', '配布資料')

@section('content')
    <app-container>
        @if ($documents->isEmpty())
            <list-view-empty icon-class="far fa-file-alt" text="配布資料はまだありません" />
        @else
            <list-view>
                @foreach ($documents as $document)
                    <list-view-item href="{{ route('documents.show', ['document' => $document]) }}" newtab>
                        <template v-slot:title>
                            @if ($document->is_important)
                                <i class="fas fa-exclamation-circle fa-fw text-danger"></i>
                            @else
                                <i class="far fa-file-alt fa-fw"></i>
                            @endif
                            {{ $document->name }}
                            @if ($document->isNew())
                                <app-badge danger>NEW</app-badge>
                            @endif
                        </template>
                        <template v-slot:meta>
                            @datetime($document->updated_at) 更新
                            @isset($document->schedule)
                                •
                                {{ $document->schedule->name }}で配布
                            @endisset
                            <br>
                            {{ strtoupper($document->extension) }}ファイル
                            •
                            @filesize($document->size)
                        </template>
                        {{ $document->description }}
                    </list-view-item>
                @endforeach
                @if ($documents->hasPages())
                    <list-view-pagination prev="{{ $documents->previousPageUrl() }}"
                        next="{{ $documents->nextPageUrl() }}" />
                @endif
            </list-view>
        @endif
    </app-container>
@endsection
