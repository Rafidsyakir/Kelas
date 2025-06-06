import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card"
import { Button } from "@/components/ui/button"
import { Badge } from "@/components/ui/badge"
import { Users, Package, ShoppingCart, DollarSign, TrendingUp, Eye, Plus, Settings } from "lucide-react"
import Link from "next/link"

export default function AdminDashboard() {
  const stats = {
    totalCustomers: 1247,
    totalProducts: 156,
    totalOrders: 89,
    todayRevenue: 45750000,
    monthlyRevenue: 1250000000,
    pendingOrders: 12,
  }

  const recentOrders = [
    {
      id: "ORD-001",
      customer: "John Doe",
      total: 15500000,
      status: "processing",
      date: "2024-01-15",
    },
    {
      id: "ORD-002",
      customer: "Jane Smith",
      total: 2000000,
      status: "shipped",
      date: "2024-01-15",
    },
    {
      id: "ORD-003",
      customer: "Bob Wilson",
      total: 750000,
      status: "pending",
      date: "2024-01-14",
    },
  ]

  const recentCustomers = [
    {
      id: 1,
      name: "Alice Johnson",
      email: "alice@example.com",
      joinDate: "2024-01-15",
      orders: 3,
    },
    {
      id: 2,
      name: "Mike Brown",
      email: "mike@example.com",
      joinDate: "2024-01-14",
      orders: 1,
    },
  ]

  const formatPrice = (price: number) => {
    return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR",
    }).format(price)
  }

  const getStatusColor = (status: string) => {
    switch (status) {
      case "pending":
        return "bg-yellow-100 text-yellow-800"
      case "processing":
        return "bg-blue-100 text-blue-800"
      case "shipped":
        return "bg-green-100 text-green-800"
      case "delivered":
        return "bg-emerald-100 text-emerald-800"
      case "cancelled":
        return "bg-red-100 text-red-800"
      default:
        return "bg-gray-100 text-gray-800"
    }
  }

  return (
    <div className="min-h-screen bg-gray-50">
      {/* Admin Header */}
      <header className="bg-white shadow-sm border-b">
        <div className="px-6 py-4">
          <div className="flex items-center justify-between">
            <div>
              <h1 className="text-2xl font-bold text-gray-800">Admin Dashboard</h1>
              <p className="text-gray-600">Kelola toko online Anda</p>
            </div>
            <div className="flex items-center space-x-4">
              <Button variant="outline" size="sm">
                <Settings className="w-4 h-4 mr-2" />
                Pengaturan
              </Button>
              <Button variant="outline" size="sm">
                Logout
              </Button>
            </div>
          </div>
        </div>
      </header>

      <div className="flex">
        {/* Sidebar */}
        <aside className="w-64 bg-white shadow-sm min-h-screen">
          <nav className="p-6">
            <div className="space-y-2">
              <Link href="/admin" className="flex items-center px-4 py-2 text-blue-600 bg-blue-50 rounded-lg">
                <TrendingUp className="w-5 h-5 mr-3" />
                Dashboard
              </Link>
              <Link
                href="/admin/customers"
                className="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg"
              >
                <Users className="w-5 h-5 mr-3" />
                Pelanggan
              </Link>
              <Link
                href="/admin/products"
                className="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg"
              >
                <Package className="w-5 h-5 mr-3" />
                Produk
              </Link>
              <Link
                href="/admin/orders"
                className="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg"
              >
                <ShoppingCart className="w-5 h-5 mr-3" />
                Pesanan
              </Link>
            </div>
          </nav>
        </aside>

        {/* Main Content */}
        <main className="flex-1 p-6">
          {/* Statistics Cards */}
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <Card>
              <CardContent className="p-6">
                <div className="flex items-center justify-between">
                  <div>
                    <p className="text-sm text-gray-600">Total Pelanggan</p>
                    <p className="text-2xl font-bold">{stats.totalCustomers.toLocaleString()}</p>
                  </div>
                  <Users className="w-8 h-8 text-blue-600" />
                </div>
              </CardContent>
            </Card>

            <Card>
              <CardContent className="p-6">
                <div className="flex items-center justify-between">
                  <div>
                    <p className="text-sm text-gray-600">Total Produk</p>
                    <p className="text-2xl font-bold">{stats.totalProducts}</p>
                  </div>
                  <Package className="w-8 h-8 text-green-600" />
                </div>
              </CardContent>
            </Card>

            <Card>
              <CardContent className="p-6">
                <div className="flex items-center justify-between">
                  <div>
                    <p className="text-sm text-gray-600">Pesanan Hari Ini</p>
                    <p className="text-2xl font-bold">{stats.totalOrders}</p>
                  </div>
                  <ShoppingCart className="w-8 h-8 text-purple-600" />
                </div>
              </CardContent>
            </Card>

            <Card>
              <CardContent className="p-6">
                <div className="flex items-center justify-between">
                  <div>
                    <p className="text-sm text-gray-600">Revenue Hari Ini</p>
                    <p className="text-2xl font-bold">{formatPrice(stats.todayRevenue)}</p>
                  </div>
                  <DollarSign className="w-8 h-8 text-yellow-600" />
                </div>
              </CardContent>
            </Card>
          </div>

          <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {/* Recent Orders */}
            <Card>
              <CardHeader className="flex flex-row items-center justify-between">
                <CardTitle>Pesanan Terbaru</CardTitle>
                <Link href="/admin/orders">
                  <Button variant="outline" size="sm">
                    <Eye className="w-4 h-4 mr-2" />
                    Lihat Semua
                  </Button>
                </Link>
              </CardHeader>
              <CardContent>
                <div className="space-y-4">
                  {recentOrders.map((order) => (
                    <div key={order.id} className="flex items-center justify-between p-4 border rounded-lg">
                      <div>
                        <p className="font-semibold">{order.id}</p>
                        <p className="text-sm text-gray-600">{order.customer}</p>
                        <p className="text-sm text-gray-500">{order.date}</p>
                      </div>
                      <div className="text-right">
                        <p className="font-semibold">{formatPrice(order.total)}</p>
                        <Badge className={getStatusColor(order.status)}>{order.status}</Badge>
                      </div>
                    </div>
                  ))}
                </div>
              </CardContent>
            </Card>

            {/* Recent Customers */}
            <Card>
              <CardHeader className="flex flex-row items-center justify-between">
                <CardTitle>Pelanggan Baru</CardTitle>
                <Link href="/admin/customers">
                  <Button variant="outline" size="sm">
                    <Eye className="w-4 h-4 mr-2" />
                    Lihat Semua
                  </Button>
                </Link>
              </CardHeader>
              <CardContent>
                <div className="space-y-4">
                  {recentCustomers.map((customer) => (
                    <div key={customer.id} className="flex items-center justify-between p-4 border rounded-lg">
                      <div>
                        <p className="font-semibold">{customer.name}</p>
                        <p className="text-sm text-gray-600">{customer.email}</p>
                        <p className="text-sm text-gray-500">Bergabung: {customer.joinDate}</p>
                      </div>
                      <div className="text-right">
                        <p className="text-sm text-gray-600">{customer.orders} pesanan</p>
                      </div>
                    </div>
                  ))}
                </div>
              </CardContent>
            </Card>
          </div>

          {/* Quick Actions */}
          <Card className="mt-6">
            <CardHeader>
              <CardTitle>Aksi Cepat</CardTitle>
            </CardHeader>
            <CardContent>
              <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
                <Link href="/admin/products/add">
                  <Button className="w-full h-20 flex flex-col items-center justify-center">
                    <Plus className="w-6 h-6 mb-2" />
                    Tambah Produk
                  </Button>
                </Link>
                <Link href="/admin/orders?status=pending">
                  <Button variant="outline" className="w-full h-20 flex flex-col items-center justify-center">
                    <ShoppingCart className="w-6 h-6 mb-2" />
                    Pesanan Pending ({stats.pendingOrders})
                  </Button>
                </Link>
                <Link href="/admin/reports">
                  <Button variant="outline" className="w-full h-20 flex flex-col items-center justify-center">
                    <TrendingUp className="w-6 h-6 mb-2" />
                    Laporan Penjualan
                  </Button>
                </Link>
              </div>
            </CardContent>
          </Card>
        </main>
      </div>
    </div>
  )
}
