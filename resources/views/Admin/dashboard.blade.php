@extends('layouts.layout')
@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SIKP UKDW') }}
        </h2>
    </x-slot>

  <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <!-- <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div> -->
    <div class="row">
   <div class="col-sm-12">
      <h2 class="mb-0">SELAMAT DATANG</h2>
      <!-- <h4 class="mt-0">Selamat Datang</h4> -->
      <hr>
   </div>
</div>



</x-app-layout>
@stop
