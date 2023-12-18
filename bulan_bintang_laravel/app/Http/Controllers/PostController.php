<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function addPost(Request $request){
        $itemPost = $request->validate([
            'item_name' => 'required',
            'price'=> 'required',
            'product_information'=> 'required',
            'material'=> 'required',
            'inside_box'=> 'required',
            'category_id'=> 'required',
            'image_path'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image_path')->store('images', 'public');
        $itemPost['item_name'] = strip_tags( $itemPost['item_name']);
        $itemPost['product_information'] = strip_tags($itemPost['product_information']);
        $itemPost['material'] = strip_tags($itemPost['material']);
        $itemPost['inside_box'] = strip_tags($itemPost['inside_box']);
        $itemPost['category_id'] = strip_tags($itemPost['category_id']);
        $itemPost['item_id'] = auth()->id();
        Post::create($itemPost);
        return redirect('adminpage'); 

    }

    public function collection()
    {
        $items = Post::all(); // Assuming you want to retrieve all posts
        return view('collection', compact('items'));
    }

    public function details($item_id)
    {
        $mysqli = new \mysqli("localhost", "root", "", "bulan_bintang");

        if ($mysqli->connect_error) {
            die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }

        $itemDetails = null;

        $query = "SELECT item_name, image_path, price, product_information, material, inside_box FROM posts WHERE item_id = ?";
        $stmt = $mysqli->prepare($query);

        if ($stmt === false) {
            die('Error: ' . $mysqli->error);
        }

        $stmt->bind_param("i", $item_id);

        $stmt->execute();

        if ($stmt->error) {
            echo "Error: " . $stmt->error;
        }

        $result = $stmt->get_result();

        $mysqli->close();

        if ($result->num_rows > 0) {
            $itemDetails = $result->fetch_assoc();
            $breadcrumb = '<a href="home">Home</a> / ';
            $breadcrumb .= '<a href="collection">Baju Melayu Slim Fit</a> / ';
            $breadcrumb .= '<span>' . $itemDetails['item_name'] . '</span>';
            
            return view('details', compact('itemDetails', 'breadcrumb'));
        } else {
            return view('details', ['error' => 'Item not found']);
        }
    }
}
