import { Card, CardContent } from "@/components/ui/card"
import { Button } from "@/components/ui/button"
import { Badge } from "@/components/ui/badge"
import { ShoppingCart, Star, Search, User, Menu } from "lucide-react"
import Link from "next/link"
import Image from "next/image"

export default function HomePage() {
  const featuredProducts = [
    {
      id: 1,
      name: "Laptop Gaming ASUS ROG",
      price: 15000000,
      image: "https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=400&h=400&fit=crop&crop=center",
      category: "Electronics",
      rating: 4.8,
      stock: 10,
    },
    {
      id: 2,
      name: "Smartphone Samsung Galaxy",
      price: 8000000,
      image: "https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=400&h=400&fit=crop&crop=center",
      category: "Electronics",
      rating: 4.6,
      stock: 25,
    },
    {
      id: 3,
      name: "Sepatu Nike Air Max",
      price: 1500000,
      image: "https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&h=400&fit=crop&crop=center",
      category: "Fashion",
      rating: 4.7,
      stock: 50,
    },
    {
      id: 4,
      name: "Tas Ransel Eiger",
      price: 500000,
      image: "https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400&h=400&fit=crop&crop=center",
      category: "Fashion",
      rating: 4.5,
      stock: 30,
    },
  ]

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
            <div className="flex items-center space-x-4">
              <h1 className="text-2xl font-bold text-blue-600">TokoOnline</h1>
            </div>

            <div className="hidden md:flex flex-1 max-w-md mx-8">
              <div className="relative w-full">
                <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4" />
                <input
                  type="text"
                  placeholder="Cari produk..."
                  className="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
              </div>
            </div>

            <div className="flex items-center space-x-4">
              <Link href="/cart">
                <Button variant="outline" size="sm">
                  <ShoppingCart className="w-4 h-4 mr-2" />
                  Cart (0)
                </Button>
              </Link>
              <Link href="/login">
                <Button variant="outline" size="sm">
                  <User className="w-4 h-4 mr-2" />
                  Login
                </Button>
              </Link>
              <Button className="md:hidden" variant="outline" size="sm">
                <Menu className="w-4 h-4" />
              </Button>
            </div>
          </div>
        </div>
      </header>

      {/* Navigation */}
      <nav className="bg-blue-600 text-white">
        <div className="container mx-auto px-4">
          <div className="flex space-x-8 py-3">
            <Link href="/" className="hover:text-blue-200">
              Home
            </Link>
            <Link href="/products" className="hover:text-blue-200">
              Semua Produk
            </Link>
            <Link href="/products?category=Electronics" className="hover:text-blue-200">
              Electronics
            </Link>
            <Link href="/products?category=Fashion" className="hover:text-blue-200">
              Fashion
            </Link>
            <Link href="/profile" className="hover:text-blue-200">
              Profil
            </Link>
          </div>
        </div>
      </nav>

      {/* Hero Section */}
      <section className="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
        <div className="container mx-auto px-4 text-center">
          <h2 className="text-4xl md:text-6xl font-bold mb-4">Belanja Online Terpercaya</h2>
          <p className="text-xl mb-8 max-w-2xl mx-auto">
            Temukan produk berkualitas dengan harga terbaik. Pengiriman cepat ke seluruh Indonesia.
          </p>
          <Link href="/products">
            <Button size="lg" className="bg-white text-blue-600 hover:bg-gray-100">
              Mulai Belanja
            </Button>
          </Link>
        </div>
      </section>

      {/* Featured Products */}
      <section className="py-16">
        <div className="container mx-auto px-4">
          <div className="text-center mb-12">
            <h3 className="text-3xl font-bold text-gray-800 mb-4">Produk Unggulan</h3>
            <p className="text-gray-600 max-w-2xl mx-auto">
              Pilihan terbaik dari berbagai kategori produk dengan kualitas terjamin
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {featuredProducts.map((product) => (
              <Card key={product.id} className="group hover:shadow-lg transition-shadow">
                <CardContent className="p-0">
                  <div className="relative overflow-hidden rounded-t-lg">
                    <Image
                      src={product.image || "/placeholder.svg"}
                      alt={product.name}
                      width={300}
                      height={300}
                      className="w-full h-48 object-cover group-hover:scale-105 transition-transform"
                      crossOrigin="anonymous"
                    />
                    <Badge className="absolute top-2 left-2 bg-blue-600">{product.category}</Badge>
                  </div>

                  <div className="p-4">
                    <h4 className="font-semibold text-gray-800 mb-2 line-clamp-2">{product.name}</h4>

                    <div className="flex items-center mb-2">
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

          <div className="text-center mt-8">
            <Link href="/products">
              <Button variant="outline" size="lg">
                Lihat Semua Produk
              </Button>
            </Link>
          </div>
        </div>
      </section>

      {/* Features */}
      <section className="bg-white py-16">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div className="text-center">
              <div className="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <ShoppingCart className="w-8 h-8 text-blue-600" />
              </div>
              <h4 className="text-xl font-semibold mb-2">Belanja Mudah</h4>
              <p className="text-gray-600">Interface yang user-friendly dan proses checkout yang simpel</p>
            </div>

            <div className="text-center">
              <div className="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <Star className="w-8 h-8 text-green-600" />
              </div>
              <h4 className="text-xl font-semibold mb-2">Kualitas Terjamin</h4>
              <p className="text-gray-600">Semua produk telah melalui quality control yang ketat</p>
            </div>

            <div className="text-center">
              <div className="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <User className="w-8 h-8 text-purple-600" />
              </div>
              <h4 className="text-xl font-semibold mb-2">Customer Service 24/7</h4>
              <p className="text-gray-600">Tim support yang siap membantu Anda kapan saja</p>
            </div>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-gray-800 text-white py-12">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
              <h5 className="text-xl font-bold mb-4">TokoOnline</h5>
              <p className="text-gray-400">Platform e-commerce terpercaya untuk semua kebutuhan belanja online Anda.</p>
            </div>

            <div>
              <h6 className="font-semibold mb-4">Kategori</h6>
              <ul className="space-y-2 text-gray-400">
                <li>
                  <Link href="/products?category=Electronics" className="hover:text-white">
                    Electronics
                  </Link>
                </li>
                <li>
                  <Link href="/products?category=Fashion" className="hover:text-white">
                    Fashion
                  </Link>
                </li>
                <li>
                  <Link href="/products?category=Home" className="hover:text-white">
                    Home & Living
                  </Link>
                </li>
                <li>
                  <Link href="/products?category=Sports" className="hover:text-white">
                    Sports
                  </Link>
                </li>
              </ul>
            </div>

            <div>
              <h6 className="font-semibold mb-4">Customer Service</h6>
              <ul className="space-y-2 text-gray-400">
                <li>
                  <Link href="/help" className="hover:text-white">
                    Pusat Bantuan
                  </Link>
                </li>
                <li>
                  <Link href="/contact" className="hover:text-white">
                    Hubungi Kami
                  </Link>
                </li>
                <li>
                  <Link href="/shipping" className="hover:text-white">
                    Info Pengiriman
                  </Link>
                </li>
                <li>
                  <Link href="/returns" className="hover:text-white">
                    Kebijakan Return
                  </Link>
                </li>
              </ul>
            </div>

            <div>
              <h6 className="font-semibold mb-4">Kontak</h6>
              <div className="space-y-2 text-gray-400">
                <p>Email: support@tokoonline.com</p>
                <p>Phone: +62 21 1234 5678</p>
                <p>WhatsApp: +62 812 3456 7890</p>
              </div>
            </div>
          </div>

          <div className="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; 2024 TokoOnline. All rights reserved.</p>
          </div>
        </div>
      </footer>
    </div>
  )
}
