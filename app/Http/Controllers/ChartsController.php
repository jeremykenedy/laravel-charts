<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\TestScore;
use App\Student;
use App\User;
use Charts;

class ChartsController extends Controller
{
    public function index()
    {
        $chart = Charts::multi('bar', 'material')
            // Setup the chart settings
            ->title("My First Chart")
            // A dimension of 0 means it will take 100% of the space
            ->dimensions(0, 400) // Width x Height
            // This defines a preset of colors already done:)
            ->template("blue-material")

            // You could always set them manually
            // ->colors(['#2196F3', '#F44336', '#FFC107'])
            // Setup the diferent datasets (this is a multi chart)
            ->dataset('Element 1', [5,20,100])
            ->dataset('Element 2', [15,30,80])
            ->dataset('Element 3', [25,10,40])
            // Setup what the values mean
            ->labels(['One', 'Two', 'Three'])
            ->responsive(true);


		$chart1 = Charts::multi('line', 'highcharts')
		    ->colors(['#ff0000', '#00ff00', '#0000ff'])
		    ->labels(['One', 'Two', 'Three'])
		    ->responsive(true)
		    ->dataset('Test 1', [1,2,3])
		    ->dataset('Test 2', [0,6,0])
		    ->dataset('Test 3', [3,4,1]);

		$chart2 = Charts::multi('bar', 'minimalist')
		    ->responsive(true)
		    ->dimensions(0, 500)
		    ->colors(['#ff0000', '#00ff00', '#0000ff'])
		    ->labels(['One', 'Two', 'Three'])
		    ->dataset('Test 1', [1,2,3])
		    ->dataset('Test 2', [0,6,0])
		    ->dataset('Test 3', [3,4,1]);

		$query3 = Student::orderBy('studentGradYear', 'asc')->get();
		$chart3 = Charts::database($query3, 'bar', 'material')
		    ->title("Students Grad")
		    ->template("teal-material")
			->elementLabel("Total")
			->dimensions(1000, 500)
			->responsive(true)
			->groupBy('studentGradYear');


		$query4 = Student::orderBy('studentGrade', 'asc')->get();
		$chart4 = Charts::database($query4, 'bar', 'material')
		    ->title("Students Grade")
		    ->template("green-material")
			->elementLabel("Total")
			->dimensions(1000, 500)
			->responsive(true)
			->groupBy('studentGrade');

		$chart5 = Charts::realtime(url('/path/to/json'), 2000, 'gauge', 'google')
		    ->values([65, 0, 100])
		    ->labels(['First', 'Second', 'Third'])
		    ->responsive(true)
		    ->height(300)
		    ->width(0)
		    ->title("Permissions Chart")
		    ->valueName('value'); //This determines the json index for the value

		$chart6 = Charts::math('sin(x)', [0, 10], 0.2, 'line', 'highcharts')->mathFunction('x+1');

		$chart7 = Charts::create('donut', 'highcharts')
			->title('My nice chart')
			->labels(['First', 'Second', 'Third'])
			->values([5,10,20])
			->dimensions(1000,500)
			->responsive(true);

		$chart8 = Charts::create('line', 'highcharts')
		    ->title('My nice chart')
		    ->elementLabel('My nice label')
		    ->labels(['First', 'Second', 'Third'])
		    ->values([5,10,20])
		    ->dimensions(1000,500)
		    ->responsive(true);

		$chart9 = Charts::create('area', 'highcharts')
		    ->title('My nice chart')
		    ->elementLabel('My nice label')
		    ->labels(['First', 'Second', 'Third'])
		    ->values([5,10,20])
		    ->dimensions(1000,500)
		    ->responsive(true);

		$chart10 = Charts::multi('areaspline', 'highcharts')
		    ->title('My nice chart')
		    ->colors(['#ff0000', '#ffffff'])
		    ->labels(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday','Saturday', 'Sunday'])
		    ->dataset('John', [3, 4, 3, 5, 4, 10, 12])
		    ->dataset('Jane',  [1, 3, 4, 3, 3, 5, 4]);

		$chart11 = Charts::create('geo', 'highcharts')
		    ->title('My nice chart')
		    ->elementLabel('My nice label')
		    ->labels(['ES', 'FR', 'RU'])
		    ->colors(['#C5CAE9', '#283593'])
		    ->values([5,10,20])
		    ->dimensions(1000,500)
		    ->responsive(true);

		$chart12 = Charts::create('temp', 'canvas-gauges')
		    ->title('My nice chart')
		    ->elementLabel('My nice label')
		    ->values([65,0,100])
		    ->responsive(true)
		    ->height(300)
		    ->width(0);

		$chart13 = Charts::create('percentage', 'justgage')
		    ->title('My nice chart')
		    ->elementLabel('My nice label')
		    ->values([65,0,100])
		    ->responsive(true)
		    ->height(300)
		    ->width(0);

		$chart14 = Charts::create('progressbar', 'progressbarjs')
		    ->values([65,0,100])
		    ->responsive(true)
		    ->height(50)
		    ->width(0);

		$chart15 = Charts::create('gauge', 'canvas-gauges')
			->title('My nice chart')
			->elementLabel('My nice label')
			->values([65,0,100])
			->responsive(true)
			->height(300)
			->width(0);

		$chart16 = Charts::create('pie', 'highcharts')
			->title('My nice chart')
			->labels(['First', 'Second', 'Third'])
			->values([5,10,20])
			->dimensions(1000,500)
			->responsive(true);

		$chart17 = Charts::math('sin(x)', [0, 10], 0.2, 'line', 'highcharts');

		$chart18 = Charts::create('bar', 'highcharts')
			->title('My nice chart')
			->elementLabel('My nice label')
			->labels(['First', 'Second', 'Third'])
			->values([5,10,20])
			->dimensions(1000,500)
			->responsive(true);

		$data = [
			'chart' => $chart,
			'chart1' => $chart1,
			'chart2' => $chart2,
			'chart3' => $chart3,
			'chart4' => $chart4,
			'chart6' => $chart6,
			'chart7' => $chart7,
			'chart8' => $chart8,
			'chart9' => $chart9,
			'chart10' => $chart10,
			'chart11' => $chart11,
			'chart12' => $chart12,
			'chart13' => $chart13,
			'chart14' => $chart14,
			'chart15' => $chart15,
			'chart16' => $chart16,
			'chart17' => $chart17,
			'chart18' => $chart18
		];

        return view('charts/chart', compact('data'));
    }

	public function scores() {

		$query = TestScore::orderBy('testType', 'asc')->get();
		$yearSelect = 2003;

		$chart1 = Charts::database($query, 'line', 'highcharts')
		    ->title('No of Tests by Level for ' . $yearSelect)
		    ->elementLabel('# of students in ' . $yearSelect)
		    ->labels([
		    	'Level 1',
		    	'Level 2',
		    	'Level 3',
		    	'Level 4',
		    	'Level 5',
		    	'Level 6',
		    	'Level 7',
		    	'Level 8',
		    ])
		    ->values([
		    	count($query->where('testLevel', 0)->where('testedYear', $yearSelect)),
		    	count($query->where('testLevel', 1)->where('testedYear', $yearSelect)),
		    	count($query->where('testLevel', 2)->where('testedYear', $yearSelect)),
		    	count($query->where('testLevel', 3)->where('testedYear', $yearSelect)),
		    	count($query->where('testLevel', 4)->where('testedYear', $yearSelect)),
		    	count($query->where('testLevel', 5)->where('testedYear', $yearSelect)),
		    	count($query->where('testLevel', 6)->where('testedYear', $yearSelect)),
		    	count($query->where('testLevel', 7)->where('testedYear', $yearSelect))
		    ])
		    ->dimensions(1000,500)
		    ->responsive(true);

		   // Test - Redo later - Do more here
			$data1 = TestScore::orderBy('testType', 'asc')
		 		->where('testedYear', 2000)
		 		->where('testLevel', 2)
		 		->where('testScore', '>', 50)
			    ->get();

			$data2 = TestScore::orderBy('testType', 'asc')
		 		->where('testedYear', 2005)
		 		->where('testLevel', 2)
		 		->where('testScore', '>', 50)
			    ->get();

			$data3 = TestScore::orderBy('testType', 'asc')
		 		->where('testedYear', 2010)
		 		->where('testLevel', 2)
		 		->where('testScore', '>', 50)
			    ->get();

			$data4 = TestScore::orderBy('testType', 'asc')
		 		->where('testedYear', 2015)
		 		->where('testLevel', 2)
		 		->where('testScore', '>', 50)
			    ->get();

			$chart2 = Charts::multi('bar', 'highcharts')

            ->title("A Chart Title")
            //->template("blue-material")
            ->colors(['#ff0000', '#00ff00', '#0000ff', '#2196F3', '#FFC107'])

            // Setup the diferent datasets (this is a multi chart) - Do more here
            ->dataset('Element 1', [count($data1),count($data2),count($data3),count($data4)])
            ->dataset('Element 2', [count($data1),count($data2),count($data3),count($data4)])
            ->dataset('Element 3', [count($data1),count($data2),count($data3),count($data4)])
            ->dataset('Element 4', [count($data1),count($data2),count($data3),count($data4)])
            // Setup what the values mean
            ->labels(['2000', '2005', '2010', '2015']) // do more here
            ->responsive(true);

			$chart3 = Charts::database(User::all(), 'gauge', 'canvas-gauges')
			    ->title("Users")
				->elementLabel("Total")
				->dimensions(1000, 500)
				->responsive(true)
				->groupBy('game');

			$data = [
				'chart1' => $chart1,
				'chart2' => $chart2
			];

		return view('charts/testscores', $data);

	}

	public function usersCharts() {

		$query = User::orderBy('name', 'asc')->get();

		$chart = Charts::database($query, 'pie', 'highcharts')
		    ->title("Users")
		    ->template("teal-material")
			->elementLabel("All")
			->dimensions(1000, 500)
			->responsive(true)
			->groupBy('name');

		$data = [
			'chart' => $chart
		];

    	return view('charts/users', $data);

	}

}
