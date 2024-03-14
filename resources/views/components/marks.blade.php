<div class="container-xxl pt-5">
    <div class="container">
        <div class="marks-slide">
            @php
                $marks = DB::table('marks')->get();
            @endphp
            @foreach ($marks as $mark)
                <div>
                    <img src="{{ asset('uploads/marks/' . $mark->image) }}" alt="{{ $mark->name }}"
                        @if ($mark->name != 'GEMAS') style="width: 100px" @endif>
                </div>
            @endforeach
        </div>
    </div>
</div>
