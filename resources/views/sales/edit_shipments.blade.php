<?php
@extends('layouts.master')
@section('main-content')

<div class="breadcrumb">
    <h1>{{ __('Edit Shipment') }}</h1>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('shipments.update', $shipment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="status">{{ __('Status') }} *</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="ordered" {{ $shipment->status == 'ordered' ? 'selected' : '' }}>{{ __('Ordered') }}</option>
                            <option value="packed" {{ $shipment->status == 'packed' ? 'selected' : '' }}>{{ __('Packed') }}</option>
                            <option value="shipped" {{ $shipment->status == 'shipped' ? 'selected' : '' }}>{{ __('Shipped') }}</option>
                            <option value="delivered" {{ $shipment->status == 'delivered' ? 'selected' : '' }}>{{ __('Delivered') }}</option>
                            <option value="cancelled" {{ $shipment->status == 'cancelled' ? 'selected' : '' }}>{{ __('Cancelled') }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="delivered_to">{{ __('Delivered To') }}</label>
                        <input type="text" class="form-control" id="delivered_to" name="delivered_to" value="{{ $shipment->delivered_to }}">
                    </div>

                    <div class="form-group">
                        <label for="shipping_address">{{ __('Shipping Address') }}</label>
                        <textarea class="form-control" id="shipping_address" name="shipping_address" rows="3">{{ $shipment->shipping_address }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="shipping_details">{{ __('Shipping Details') }}</label>
                        <textarea class="form-control" id="shipping_details" name="shipping_details" rows="3">{{ $shipment->shipping_details }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    <a href="{{ route('shipments.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection