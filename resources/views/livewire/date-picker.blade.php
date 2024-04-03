<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <select class="form-control" wire:model="month">
                <option value="">Select month</option>
                @for ($m = 1; $m <= 12; $m++)
                    <option value="{{ $m }}">{{ date('F', mktime(0, 0, 0, $m, 1)) }}</option>
                @endfor
            </select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <select class="form-control" wire:model="day">
                <option value="">Day</option>
                @for ($d = 1; $d <= $daysInMonth; $d++)
                    <option value="{{ $d }}">{{ $d }}</option>
                @endfor
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <select class="form-control" wire:model="year">
                <option value="">Select year</option>
                @for ($y = date('Y'); $y >= date('Y') - 120; $y--)
                    <option value="{{ $y }}">{{ $y }}</option>
                @endfor
            </select>
        </div>
    </div>
</div>
