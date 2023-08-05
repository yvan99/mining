<?php

namespace App\Http\Controllers;

use App\Models\Mineral;
use Illuminate\Http\Request;
use PDF;

class MineralController extends Controller
{
    public function index()
    {
        $minerals = Mineral::all();
        return view('minerals.index', compact('minerals'));
    }

    public function generateMineralsPdf()
    {
        $mineralsByDate = Mineral::selectRaw('DATE(created_at) as date, GROUP_CONCAT(id) as mineral_ids')
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->get();
    
        foreach ($mineralsByDate as $mineralsData) {
            $mineralIds = explode(',', $mineralsData->mineral_ids);
            $minerals = Mineral::whereIn('id', $mineralIds)->get();
    
            $totalQuantity = $minerals->sum('quantity');
            $totalWeight = $minerals->sum('weight');
            $totalExportValue = $minerals->sum('exported_value');
    
            $pdf = PDF::loadView('minerals.daily_pdf', compact('minerals','mineralsByDate', 'mineralsData', 'totalQuantity', 'totalWeight', 'totalExportValue'));
    
            $pdfFileName = 'daily_minerals_' . $mineralsData->date . '.pdf';
    
            return $pdf->download($pdfFileName);
        }
    }

    public function show($id)
    {
        $mineral = Mineral::findOrFail($id);

        return view('minerals.show', compact('mineral'));
    }

    public function indexClient()
    {
        $minerals = Mineral::all();
        return view('minerals.client', compact('minerals'));
    }

    public function create()
    {
        return view('minerals.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'mine_tag' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'picture' => 'nullable|image|max:2048',
            'content' => 'nullable|string',
            'source' => 'nullable|string|max:255',
            'weight' => 'required|numeric',
            'exported_value' => 'required|numeric',
        ]);

        $mineral = new Mineral();
        $mineral->name = $validatedData['name'];
        $mineral->mine_tag = $validatedData['mine_tag'];
        $mineral->quantity = $validatedData['quantity'];
        $mineral->content = $validatedData['content'];
        $mineral->source = $validatedData['source'];
        $mineral->weight = $validatedData['weight'];
        $mineral->exported_value = $validatedData['exported_value'];

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('minerals'), $imageName);
            $mineral->picture = '/minerals/' . $imageName;
        }

        $mineral->save();

        return redirect()->back()->with('success', 'Mineral added successfully.');
    }
}
