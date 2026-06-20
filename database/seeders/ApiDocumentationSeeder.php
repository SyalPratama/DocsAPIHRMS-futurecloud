<?php

namespace Database\Seeders;

use App\Models\ApiDocumentation;
use Illuminate\Database\Seeder;

class ApiDocumentationSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // System
            ['module' => 'System', 'name' => 'User', 'method' => 'GET', 'endpoint' => '/api/resource/User', 'description' => 'Data user login'],
            ['module' => 'System', 'name' => 'Role', 'method' => 'GET', 'endpoint' => '/api/resource/Role', 'description' => 'Hak akses user'],
            ['module' => 'System', 'name' => 'Company', 'method' => 'GET', 'endpoint' => '/api/resource/Company', 'description' => 'Data perusahaan'],
            ['module' => 'System', 'name' => 'File', 'method' => 'POST', 'endpoint' => '/api/resource/File', 'description' => 'Upload & attachment'],
            ['module' => 'System', 'name' => 'DocType', 'method' => 'GET', 'endpoint' => '/api/resource/DocType', 'description' => 'Daftar seluruh API'],

            // HRMS
            ['module' => 'HRMS', 'name' => 'Employee', 'method' => 'GET', 'endpoint' => '/api/resource/Employee', 'description' => 'Data karyawan'],
            ['module' => 'HRMS', 'name' => 'Employee Group', 'method' => 'GET', 'endpoint' => '/api/resource/Employee Group', 'description' => 'Kelompok karyawan'],
            ['module' => 'HRMS', 'name' => 'Department', 'method' => 'GET', 'endpoint' => '/api/resource/Department', 'description' => 'Departemen'],
            ['module' => 'HRMS', 'name' => 'Designation', 'method' => 'GET', 'endpoint' => '/api/resource/Designation', 'description' => 'Jabatan'],
            ['module' => 'HRMS', 'name' => 'Employee Checkin', 'method' => 'POST', 'endpoint' => '/api/resource/Employee Checkin', 'description' => 'Check-in/out absensi'],
            ['module' => 'HRMS', 'name' => 'Attendance', 'method' => 'GET', 'endpoint' => '/api/resource/Attendance', 'description' => 'Rekap absensi'],
            ['module' => 'HRMS', 'name' => 'Shift Type', 'method' => 'GET', 'endpoint' => '/api/resource/Shift Type', 'description' => 'Jadwal shift'],
            ['module' => 'HRMS', 'name' => 'Holiday List', 'method' => 'GET', 'endpoint' => '/api/resource/Holiday List', 'description' => 'Kalender libur'],
            ['module' => 'HRMS', 'name' => 'Leave Application', 'method' => 'POST', 'endpoint' => '/api/resource/Leave Application', 'description' => 'Pengajuan cuti'],
            ['module' => 'HRMS', 'name' => 'Leave Type', 'method' => 'GET', 'endpoint' => '/api/resource/Leave Type', 'description' => 'Jenis cuti'],
            ['module' => 'HRMS', 'name' => 'Leave Allocation', 'method' => 'POST', 'endpoint' => '/api/resource/Leave Allocation', 'description' => 'Alokasi cuti'],
            ['module' => 'HRMS', 'name' => 'Salary Slip', 'method' => 'GET', 'endpoint' => '/api/resource/Salary Slip', 'description' => 'Slip gaji'],
            ['module' => 'HRMS', 'name' => 'Salary Structure', 'method' => 'GET', 'endpoint' => '/api/resource/Salary Structure', 'description' => 'Struktur gaji'],
            ['module' => 'HRMS', 'name' => 'Salary Component', 'method' => 'GET', 'endpoint' => '/api/resource/Salary Component', 'description' => 'Komponen gaji'],
            ['module' => 'HRMS', 'name' => 'Employee Advance', 'method' => 'POST', 'endpoint' => '/api/resource/Employee Advance', 'description' => 'Kasbon karyawan'],
            ['module' => 'HRMS', 'name' => 'Expense Claim', 'method' => 'POST', 'endpoint' => '/api/resource/Expense Claim', 'description' => 'Klaim biaya'],
            ['module' => 'HRMS', 'name' => 'Appraisal', 'method' => 'GET', 'endpoint' => '/api/resource/Appraisal', 'description' => 'Penilaian kinerja'],
            ['module' => 'HRMS', 'name' => 'Employee Performance Feedback', 'method' => 'POST', 'endpoint' => '/api/resource/Employee Performance Feedback', 'description' => 'Feedback performa'],

            // Accounting
            ['module' => 'Accounting', 'name' => 'Account', 'method' => 'GET', 'endpoint' => '/api/resource/Account', 'description' => 'Chart of Account'],
            ['module' => 'Accounting', 'name' => 'Journal Entry', 'method' => 'POST', 'endpoint' => '/api/resource/Journal Entry', 'description' => 'Jurnal keuangan'],
            ['module' => 'Accounting', 'name' => 'General Ledger', 'method' => 'GET', 'endpoint' => '/api/resource/GL Entry', 'description' => 'Ledger transaksi'],
            ['module' => 'Accounting', 'name' => 'Payment Entry', 'method' => 'POST', 'endpoint' => '/api/resource/Payment Entry', 'description' => 'Pembayaran'],
            ['module' => 'Accounting', 'name' => 'Bank', 'method' => 'GET', 'endpoint' => '/api/resource/Bank', 'description' => 'Data bank'],
            ['module' => 'Accounting', 'name' => 'Bank Account', 'method' => 'GET', 'endpoint' => '/api/resource/Bank Account', 'description' => 'Rekening bank'],
            ['module' => 'Accounting', 'name' => 'Sales Invoice', 'method' => 'POST', 'endpoint' => '/api/resource/Sales Invoice', 'description' => 'Faktur penjualan'],
            ['module' => 'Accounting', 'name' => 'Purchase Invoice', 'method' => 'POST', 'endpoint' => '/api/resource/Purchase Invoice', 'description' => 'Faktur pembelian'],
            ['module' => 'Accounting', 'name' => 'Tax', 'method' => 'GET', 'endpoint' => '/api/resource/Sales Taxes and Charges', 'description' => 'Pajak'],
            ['module' => 'Accounting', 'name' => 'Cost Center', 'method' => 'GET', 'endpoint' => '/api/resource/Cost Center', 'description' => 'Pusat biaya'],
            ['module' => 'Accounting', 'name' => 'Budget', 'method' => 'GET', 'endpoint' => '/api/resource/Budget', 'description' => 'Anggaran'],

            // Sales
            ['module' => 'Sales', 'name' => 'Customer', 'method' => 'GET', 'endpoint' => '/api/resource/Customer', 'description' => 'Pelanggan'],
            ['module' => 'Sales', 'name' => 'Lead', 'method' => 'GET', 'endpoint' => '/api/resource/Lead', 'description' => 'Calon customer'],
            ['module' => 'Sales', 'name' => 'Opportunity', 'method' => 'GET', 'endpoint' => '/api/resource/Opportunity', 'description' => 'Prospek'],
            ['module' => 'Sales', 'name' => 'Quotation', 'method' => 'POST', 'endpoint' => '/api/resource/Quotation', 'description' => 'Penawaran'],
            ['module' => 'Sales', 'name' => 'Sales Order', 'method' => 'POST', 'endpoint' => '/api/resource/Sales Order', 'description' => 'Order penjualan'],
            ['module' => 'Sales', 'name' => 'Delivery Note', 'method' => 'POST', 'endpoint' => '/api/resource/Delivery Note', 'description' => 'Pengiriman barang'],

            // Purchase
            ['module' => 'Purchase', 'name' => 'Supplier', 'method' => 'GET', 'endpoint' => '/api/resource/Supplier', 'description' => 'Vendor'],
            ['module' => 'Purchase', 'name' => 'Material Request', 'method' => 'POST', 'endpoint' => '/api/resource/Material Request', 'description' => 'Permintaan barang'],
            ['module' => 'Purchase', 'name' => 'Request for Quotation', 'method' => 'POST', 'endpoint' => '/api/resource/Request for Quotation', 'description' => 'Permintaan harga'],
            ['module' => 'Purchase', 'name' => 'Purchase Order', 'method' => 'POST', 'endpoint' => '/api/resource/Purchase Order', 'description' => 'Order pembelian'],

            // Inventory
            ['module' => 'Inventory', 'name' => 'Item', 'method' => 'GET', 'endpoint' => '/api/resource/Item', 'description' => 'Master barang'],
            ['module' => 'Inventory', 'name' => 'Item Group', 'method' => 'GET', 'endpoint' => '/api/resource/Item Group', 'description' => 'Kategori barang'],
            ['module' => 'Inventory', 'name' => 'Warehouse', 'method' => 'GET', 'endpoint' => '/api/resource/Warehouse', 'description' => 'Gudang'],
            ['module' => 'Inventory', 'name' => 'Stock Entry', 'method' => 'POST', 'endpoint' => '/api/resource/Stock Entry', 'description' => 'Mutasi stok'],
            ['module' => 'Inventory', 'name' => 'Stock Ledger Entry', 'method' => 'GET', 'endpoint' => '/api/resource/Stock Ledger Entry', 'description' => 'Riwayat stok'],
            ['module' => 'Inventory', 'name' => 'Batch', 'method' => 'GET', 'endpoint' => '/api/resource/Batch', 'description' => 'Nomor batch'],
            ['module' => 'Inventory', 'name' => 'Serial No', 'method' => 'GET', 'endpoint' => '/api/resource/Serial No', 'description' => 'Serial barang'],

            // Manufacturing
            ['module' => 'Manufacturing', 'name' => 'BOM', 'method' => 'GET', 'endpoint' => '/api/resource/BOM', 'description' => 'Komposisi produksi'],
            ['module' => 'Manufacturing', 'name' => 'Work Order', 'method' => 'POST', 'endpoint' => '/api/resource/Work Order', 'description' => 'Perintah produksi'],
            ['module' => 'Manufacturing', 'name' => 'Job Card', 'method' => 'POST', 'endpoint' => '/api/resource/Job Card', 'description' => 'Aktivitas produksi'],

            // Project
            ['module' => 'Project', 'name' => 'Project', 'method' => 'GET', 'endpoint' => '/api/resource/Project', 'description' => 'Proyek'],
            ['module' => 'Project', 'name' => 'Task', 'method' => 'GET', 'endpoint' => '/api/resource/Task', 'description' => 'Task pekerjaan'],
            ['module' => 'Project', 'name' => 'Timesheet', 'method' => 'POST', 'endpoint' => '/api/resource/Timesheet', 'description' => 'Jam kerja'],

            // Asset
            ['module' => 'Asset', 'name' => 'Asset', 'method' => 'GET', 'endpoint' => '/api/resource/Asset', 'description' => 'Aset perusahaan'],
            ['module' => 'Asset', 'name' => 'Asset Category', 'method' => 'GET', 'endpoint' => '/api/resource/Asset Category', 'description' => 'Kategori aset'],

            // Quality
            ['module' => 'Quality', 'name' => 'Quality Inspection', 'method' => 'POST', 'endpoint' => '/api/resource/Quality Inspection', 'description' => 'Pemeriksaan kualitas'],

            // CRM
            ['module' => 'CRM', 'name' => 'Communication', 'method' => 'GET', 'endpoint' => '/api/resource/Communication', 'description' => 'Email/chat/log'],
            ['module' => 'CRM', 'name' => 'Contact', 'method' => 'GET', 'endpoint' => '/api/resource/Contact', 'description' => 'Kontak customer'],
            ['module' => 'CRM', 'name' => 'Address', 'method' => 'GET', 'endpoint' => '/api/resource/Address', 'description' => 'Alamat'],

            // Support
            ['module' => 'Support', 'name' => 'Issue', 'method' => 'POST', 'endpoint' => '/api/resource/Issue', 'description' => 'Ticket masalah'],
            ['module' => 'Support', 'name' => 'Service Level Agreement', 'method' => 'GET', 'endpoint' => '/api/resource/Service Level Agreement', 'description' => 'SLA'],
        ];

        foreach ($data as $item) {
            ApiDocumentation::updateOrCreate(
                ['name' => $item['name'], 'module' => $item['module']],
                array_merge($item, [
                    'request' => [],
                    'response' => ['status' => 'success', 'data' => []]
                ])
            );
        }
    }
}