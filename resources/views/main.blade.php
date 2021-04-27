@extends('base')
@section('header')
    <p class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 via-green-200 to-green-400">
        Valūtas kalkulators</p>
@endsection
@section('main')
    <form method="post">
        @csrf
        <div class="flex flex-col space-y-4 text-xl">
            <div class="inline-flex justify-start items-center space-x-2">
                <label for="amount" class="text-green-200">no</label>
                <input type="text" id="amount" name="amount" maxlength="12" pattern="[0-9]+([\.,][0-9]{1,2})?"
                       value="{{$chosenAmount??''}}"
                       class="h-8 text-center text-black w-36 border border-green-700 rounded-md">
                <p class="text-green-200">EUR</p>
            </div>
            <div class="inline-flex justify-start items-center space-x-2">
                <label for="currencies" class="text-green-200">uz</label>
                <select id="currencies" name="symbol"
                        class="h-8 text-center text-black w-26 border border-green-700 rounded-md">
                    @foreach ($currencies as $currency)
                        <option value="{{ $currency->symbol }}"
                                @if(isset($selectedSymbol)&&$selectedSymbol===$currency->symbol)
                                selected
                                @endif>
                            {{$props->flag($currency->symbol)}}&ensp;&nbsp;{{ $currency->symbol }}&emsp;&nbsp;{{$props->name($currency->symbol)}}
                        </option>
                    @endforeach
                </select>
                <input type="submit" value="Rēķināt"
                       class="h-8 bg-white border border-green-700 text-green-900 hover:bg-white hover:text-green-300 px-2 rounded-md">
            </div>
        </div>
    </form>
    <p class="h-10 text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 via-green-200 to-green-400">
        @if($outcome!=='')
            {{$outcome}} {{$selectedSymbol}}
        @endif
    </p>
@endsection