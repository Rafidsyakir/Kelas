"use client"

import { useState } from "react"
import { Card, CardContent } from "@/components/ui/card"
import { Button } from "@/components/ui/button"
import { Badge } from "@/components/ui/badge"
import { Input } from "@/components/ui/input"
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select"
import { ShoppingCart, Star, Search, Grid, List } from "lucide-react"
import Link from "next/link"
import Image from "next/image"

export default function ProductsPage() {
  const [viewMode, setViewMode] = useState<"grid" | "list">("grid")
  const [searchTerm, setSearchTerm] = useState("")
  const [selectedCategory, setSelectedCategory] = useState("all")
  const [sortBy, setSortBy] = useState("name")

  const products = [
    {
      id: 1,
      name: "Laptop Gaming ASUS ROG Strix G15",
      description: "Laptop gaming dengan processor AMD Ryzen 7, RTX 3060, RAM 16GB, SSD 512GB",
      price: 15000000,
      image: "https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=400&h=400&fit=crop&crop=center",
      category: "Electronics",
      rating: 4.8,
      stock: 10,
      status: "active",
    },
    {
      id: 2,
      name: "Smartphone Samsung Galaxy S23",
      description: "Smartphone flagship dengan kamera 50MP, layar Dynamic AMOLED 6.1 inch",
      price: 8000000,
      image: "https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=400&h=400&fit=crop&crop=center",
      category: "Electronics",
      rating: 4.6,
      stock: 25,
      status: "active",
    },
    {
      id: 3,
      name: "Sepatu Nike Air Max 270",
      description: "Sepatu olahraga dengan teknologi Air Max untuk kenyamanan maksimal",
      price: 1500000,
      image: "https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&h=400&fit=crop&crop=center",
      category: "Fashion",
      rating: 4.7,
      stock: 50,
      status: "active",
    },
    {
      id: 4,
      name: "Tas Ransel Eiger Daypack",
      description: "Tas ransel outdoor dengan material tahan air dan desain ergonomis",
      price: 500000,
      image: "https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400&h=400&fit=crop&crop=center",
      category: "Fashion",
      rating: 4.5,
      stock: 30,
      status: "active",
    },
    {
      id: 5,
      name: "Kamera Canon EOS R6 Mark II",
      description: "Kamera mirrorless full-frame dengan sensor 24.2MP dan video 4K",
      price: 12000000,
      image: "https://images.unsplash.com/photo-1606983340126-99ab4feaa64a?w=400&h=400&fit=crop&crop=center",
      category: "Electronics",
      rating: 4.9,
      stock: 8,
      status: "active",
    },
    {
      id: 6,
      name: "Jam Tangan Casio G-Shock",
      description: "Jam tangan digital tahan air dengan fitur stopwatch dan alarm",
      price: 2500000,
      image: "https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=400&h=400&fit=crop&crop=center",
      category: "Fashion",
      rating: 4.4,
      stock: 20,
      status: "active",
    },
  ]

  const categories = [
    { value: "all", label: "Semua Kategori" },
    { value: "Electronics", label: "Electronics" },
    { value: "Fashion", label: "Fashion" },
    { value: "Home", label: "Home & Living" },
    { value: "Sports", label: "Sports" },
  ]

  const sortOptions = [
    { value: "name", label: "Nama A-Z" },
    { value: "price-low", label: "Harga Terendah" },
    { value: "price-high", label: "Harga Tertinggi" },
    { value: "rating", label: "Rating Tertinggi" },
    { value: "newest", label: "Terbaru" },
  ]

  const filteredProducts = products
    .filter((product) => {
      const matchesSearch = product.name.toLowerCase().includes(searchTerm.toLowerCase())
      const matchesCategory = selectedCategory === "all" || product.category === selectedCategory
      return matchesSearch && matchesCategory
    })
    .sort((a, b) => {
      switch (sortBy) {
        case "price-low":
          return a.price - b.price
        case "price-high":
          return b.price - a.price
        case "rating":
          return b.rating - a.rating
        case "name":
        default:
          return a.name.localeCompare(b.name)
      }
    })

  const formatPrice = (price: number) => {
    return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR",
    }).format(price)
  }

  return (
    <div className="min-h-screen bg-gray-50">
      {/* Header */}
      <header className="bg-white shadow-sm border-b">
        <div className="container mx-auto px-4 py-4">
          <div className="flex items-center justify-between">
            <Link href="/" className="text-2xl font-bold text-blue-600">
              TokoOnline
            </Link>
            <div className="flex items-center space-x-4">
              <Link href="/cart">
                <Button variant="outline" size="sm">
                  <ShoppingCart className="w-4 h-4 mr-2" />
                  Cart (0)
                </Button>
              </Link>
              <Link href="/login">
                <Button variant="outline" size="sm">
                  Login
                </Button>
              </Link>
            </div>
          </div>
        </div>
      </header>

      <div className="container mx-auto px-4 py-8">
        {/* Page Header */}
        <div className="mb-8">
          <h1 className="text-3xl font-bold text-gray-800 mb-2">Semua Produk</h1>
          <p className="text-gray-600">Temukan produk yang Anda cari</p>
        </div>

        {/* Filters and Search */}
        <div className="bg-white rounded-lg shadow-sm p-6 mb-8">
          <div className="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
            <div className="relative">
              <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4" />
              <Input
                placeholder="Cari produk..."
                value={searchTerm}
                onChange={(e) => setSearchTerm(e.target.value)}
                className="pl-10"
              />
            </div>

            <Select value={selectedCategory} onValueChange={setSelectedCategory}>
              <SelectTrigger>
                <SelectValue placeholder="Pilih kategori" />
              </SelectTrigger>
              <SelectContent>
                {categories.map((category) => (
                  <SelectItem key={category.value} value={category.value}>
                    {category.label}
                  </SelectItem>
                ))}
              </SelectContent>
            </Select>

            <Select value={sortBy} onValueChange={setSortBy}>
              <SelectTrigger>
                <SelectValue placeholder="Urutkan" />
              </SelectTrigger>
              <SelectContent>
                {sortOptions.map((option) => (
                  <SelectItem key={option.value} value={option.value}>
                    {option.label}
                  </SelectItem>
                ))}
              </SelectContent>
            </Select>

            <div className="flex items-center space-x-2">
              <Button
                variant={viewMode === "grid" ? "default" : "outline"}
                size="sm"
                onClick={() => setViewMode("grid")}
              >
                <Grid className="w-4 h-4" />
              </Button>
              <Button
                variant={viewMode === "list" ? "default" : "outline"}
                size="sm"
                onClick={() => setViewMode("list")}
              >
                <List className="w-4 h-4" />
              </Button>
            </div>
          </div>

          <div className="flex items-center justify-between text-sm text-gray-600">
            <span>Menampilkan {filteredProducts.length} produk</span>
            <span>Halaman 1 dari 1</span>
          </div>
        </div>

        {/* Products Grid/List */}
        {viewMode === "grid" ? (
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            {filteredProducts.map((product) => (
              <Card key={product.id} className="group hover:shadow-lg transition-shadow">
                <CardContent className="p-0">
                  <div className="relative overflow-hidden rounded-t-lg">
                    <Image
                      src={product.image || "/placeholder.svg"}
                      alt={product.name}
                      width={400}
                      height={300}
                      className="w-full h-48 object-cover group-hover:scale-105 transition-transform"
                      crossOrigin="anonymous"
                    />
                    <Badge className="absolute top-2 left-2 bg-blue-600">{product.category}</Badge>
                    {product.stock < 10 && <Badge className="absolute top-2 right-2 bg-red-600">Stok Terbatas</Badge>}
                  </div>

                  <div className="p-4">
                    <h4 className="font-semibold text-gray-800 mb-2 line-clamp-2">{product.name}</h4>

                    <p className="text-sm text-gray-600 mb-3 line-clamp-2">{product.description}</p>

                    <div className="flex items-center mb-3">
                      <div className="flex items-center">
                        <Star className="w-4 h-4 fill-yellow-400 text-yellow-400" />
                        <span className="text-sm text-gray-600 ml-1">{product.rating}</span>
                      </div>
                      <span className="text-sm text-gray-500 ml-auto">Stok: {product.stock}</span>
                    </div>

                    <div className="flex items-center justify-between">
                      <span className="text-lg font-bold text-blue-600">{formatPrice(product.price)}</span>
                      <Button size="sm">
                        <ShoppingCart className="w-4 h-4 mr-1" />
                        Beli
                      </Button>
                    </div>
                  </div>
                </CardContent>
              </Card>
            ))}
          </div>
        ) : (
          <div className="space-y-4">
            {filteredProducts.map((product) => (
              <Card key={product.id} className="hover:shadow-lg transition-shadow">
                <CardContent className="p-6">
                  <div className="flex items-center space-x-6">
                    <div className="relative">
                      <Image
                        src={product.image || "/placeholder.svg"}
                        alt={product.name}
                        width={120}
                        height={120}
                        className="w-24 h-24 object-cover rounded-lg"
                        crossOrigin="anonymous"
                      />
                      <Badge className="absolute -top-2 -right-2 bg-blue-600">{product.category}</Badge>
                    </div>

                    <div className="flex-1">
                      <h4 className="font-semibold text-gray-800 mb-2">{product.name}</h4>
                      <p className="text-sm text-gray-600 mb-3">{product.description}</p>
                      <div className="flex items-center space-x-4">
                        <div className="flex items-center">
                          <Star className="w-4 h-4 fill-yellow-400 text-yellow-400" />
                          <span className="text-sm text-gray-600 ml-1">{product.rating}</span>
                        </div>
                        <span className="text-sm text-gray-500">Stok: {product.stock}</span>
                      </div>
                    </div>

                    <div className="text-right">
                      <div className="text-xl font-bold text-blue-600 mb-3">{formatPrice(product.price)}</div>
                      <Button>
                        <ShoppingCart className="w-4 h-4 mr-2" />
                        Tambah ke Cart
                      </Button>
                    </div>
                  </div>
                </CardContent>
              </Card>
            ))}
          </div>
        )}

        {filteredProducts.length === 0 && (
          <div className="text-center py-12">
            <p className="text-gray-500 text-lg">Tidak ada produk yang ditemukan</p>
            <p className="text-gray-400">Coba ubah filter atau kata kunci pencarian</p>
          </div>
        )}
      </div>
    </div>
  )
}
