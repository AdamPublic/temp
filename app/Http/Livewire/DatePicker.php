<?php

namespace App\Http\Livewire;

use DateTime;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class DatePicker extends Component
{
    public $identifier;
    public $selectedDate;
    public $month;
    public $year;
    public $day;
    public $daysInMonth;

    protected static array $selectedDates = [];

    public function mount()
    {
        $selected = Cache::get("selectedDates:$this->identifier");
        if (!empty($selected)) {
            $this->month = $selected['month'];
            $this->year = $selected['year'];
            $this->updateDays();
            $this->day = $selected['day'];
        }
    }

    public function updatedMonth()
    {
        $this->updateDays();
        $this->update();
    }

    private function updateDays()
    {
        $year = $this->year ?? date('Y');
        $this->daysInMonth = cal_days_in_month(CAL_GREGORIAN, $this->month, $year);
        if ($this->day > $this->daysInMonth) {
            $this->day = $this->daysInMonth;
        }
    }

    public function update()
    {
        if ($this->month && $this->day && $this->year) {
            $dateTime = DateTime::createFromFormat('Y-m-d', "$this->year-$this->month-$this->day");
            $this->selectedDate = $dateTime->format('Y-m-d');
            $this->emit('dateSelected', $this->selectedDate, $this->identifier);
            Cache::set("selectedDates:$this->identifier", [
                'month' => $this->month,
                'day' => $this->day,
                'year' => $this->year,
                'date' => $this->selectedDate
            ]);
        }
    }

    public function updatedYear()
    {
        $this->updateDays();
        $this->update();
    }

    public function updatedDay()
    {
        $this->update();
    }

    public function render()
    {
        return view('livewire.date-picker');
    }
}
