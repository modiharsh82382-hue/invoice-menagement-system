@extends('products.form')

@section('title', 'Edit Product - Invoice Management System')
@section('heading', 'Edit Product')
@section('subheading', 'Update product details, pricing or stock.')
@section('form_action', route('products.update', $product->id))
@section('method') @method('PUT') @endsection
@section('button_text', 'Update Product')
