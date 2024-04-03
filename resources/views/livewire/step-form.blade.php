<div>
    <form wire:submit.prevent="save">
        {{-- STEP 1 --}}

        @if ($currentStep == 1)

            <div class="step-one">
                <div class="card">
                    <div class="card-header bg-secondary text-white">STEP 1/2 - Name & Address</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">First name</label>
                                    <input type="text" class="form-control" placeholder="Enter first name"
                                           wire:model="first_name">
                                    <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Last name</label>
                                    <input type="text" class="form-control" placeholder="Enter last name"
                                           wire:model="last_name">
                                    <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" placeholder="Enter your address"
                                           wire:model="address">
                                    <span class="text-danger">@error('address'){{ $message }}@enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">City</label>
                                    <input type="text" class="form-control" placeholder="Enter city" wire:model="city">
                                    <span class="text-danger">@error('city'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Country</label>
                                    <select class="form-control" wire:model="country">
                                        <option value="" selected>Choose country</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="MX">Mexico</option>
                                    </select>
                                    <span class="text-danger">@error('country'){{ $message }}@enderror</span>
                                </div>
                            </div>
                        </div>
                        <label for="">Date of Birth</label>
                        <livewire:date-picker identifier="date_of_birth"/>
                        <span class="text-danger">@error('date_of_birth'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>
        @endif

        {{-- STEP 2 --}}

        @if ($currentStep == 2)

            <div class="step-two">
                <div class="card">
                    <div class="card-header bg-secondary text-white">STEP 2/2 - Marriage Information</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Are you married?</label>
                                    <select class="form-control" wire:model="is_married">
                                        <option value="" selected>Select one</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <span class="text-danger">@error('is_married'){{ $message }}@enderror</span>
                                </div>
                            </div>
                        </div>
                        @if ($is_married)

                            <label for="">Date of Marriage</label>
                            <livewire:date-picker identifier="date_of_marriage"/>
                            <span class="text-danger">@error('date_of_marriage'){{ $message }}@enderror</span>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Country of marriage</label>
                                        <select class="form-control" wire:model="marriage_country">
                                            <option value="" selected>Select country</option>
                                            <option value="US">United States</option>
                                            <option value="CA">Canada</option>
                                            <option value="MX">Mexico</option>
                                        </select>
                                        <span
                                            class="text-danger">@error('marriage_country'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>

                        @elseif ($is_married !== "")

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Are you widowed?</label>
                                        <select class="form-control" wire:model="is_widowed">
                                            <option value="" selected>Select one</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        <span class="text-danger">@error('is_widowed'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Have you ever been married in the past?</label>
                                        <select class="form-control" wire:model="had_past_marriage">
                                            <option value="" selected>Select one</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        <span
                                            class="text-danger">@error('had_past_marriage'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>

                        @endif
                    </div>
                </div>
            </div>

        @endif
        <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">
            @if ($currentStep == 1)
                <div></div>
                <button type="button" class="btn btn-md btn-success" wire:click="nextStep()">Next</button>
            @endif

            @if ($currentStep == 2)
                <button type="button" class="btn btn-md btn-secondary" wire:click="previousStep()">Previous</button>
                <button type="submit" class="btn btn-md btn-primary">Submit</button>
            @endif
        </div>
    </form>
</div>
