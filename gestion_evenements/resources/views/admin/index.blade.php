@extends('layouts.app')
@section('content')
<div class="container mt-10 ml-10">
<div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
  <div class="flex justify-between mb-3">
    <div class="flex items-center">
      <div class="flex justify-center items-center">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">Statistiques</h5>
        <svg data-popover-target="chart-info" data-popover-placement="bottom" class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/>
        </svg>
        <div data-popover id="chart-info" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
            <div class="p-3 space-y-2">
                <h3 class="font-semibold text-gray-900 dark:text-white">Activity growth - Incremental</h3>
                <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should have a growing trend, as stagnating chart signifies a significant decrease of community activity.</p>
                <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                <p>For each date bucket, the all-time volume of activities is calculated. This means that activities in period n contain all activities up to period n, plus the activities generated by your community in period.</p>
                <a href="#" class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg></a>
            </div>
            <div data-popper-arrow></div>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-gray-50 dark:bg-gray-700 p- rounded-lg">
    <div class="grid grid-cols-4 gap-3 mb-2">
      <dl class="bg-orange-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
        <dt class="w-8 h-8 rounded-full bg-orange-100 dark:bg-gray-500 text-orange-600 dark:text-orange-300 text-sm font-medium flex items-center justify-center mb-1">{{$users}}</dt>
        <dd class="text-orange-600 dark:text-orange-300 text-sm font-medium">Users</dd>
      </dl>
      <dl class="bg-teal-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
        <dt class="w-8 h-8 rounded-full bg-teal-100 dark:bg-gray-500 text-teal-600 dark:text-teal-300 text-sm font-medium flex items-center justify-center mb-1">{{$event}}</dt>
        <dd class="text-teal-600 dark:text-teal-300 text-sm font-medium">Events</dd>
      </dl>
      <dl class="bg-blue-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
        <dt class="w-8 h-8 rounded-full bg-blue-100 dark:bg-gray-500 text-blue-600 dark:text-blue-300 text-sm font-medium flex items-center justify-center mb-1">{{$reservation}}</dt>
        <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium">Reservations</dd>
      </dl>
      <dl class="bg-blue-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
        <dt class="w-8 h-8 rounded-full bg-blue-100 dark:bg-gray-500 text-blue-600 dark:text-blue-300 text-sm font-medium flex items-center justify-center mb-1">{{$categorie}}</dt>
        <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium">Categories</dd>
      </dl>
    </div>
    
  </div>

  <!-- Radial Chart -->
  <div class="py-6" id="radial-chart"></div>

  
</div>
</div>

@endsection