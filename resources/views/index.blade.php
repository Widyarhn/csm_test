<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindrome Checker</title>
</head>

<body>
    <h4>Pertanyaan 1: </h4>
    <p id="output1"></p>

    <h4>Pertanyaan 2:</h4>
    <input type="text" id="palindrom" placeholder="Masukkan teks">
    <button onclick="checkPalindromeInput()">Cek Palindrom</button>
    <p id="palindromTrue"></p>

    <h4>Pertanyaan 3: </h4>
    <p id="output3"></p>

    pertanyaan 4:
    //seandainya kita sdh buat model untuk tbl_members dan tbl_address yang dimana di model Adress itu ada relasi
    seperti berikut
    public function member()
    {
    return $this->belongsTo(Member::class);
    }
    untuk di model mebernya ada relasi ini
    public function address()
    {
    return $this->hasOne(Address::class);
    }

    selanjutnya buat querynya andai di controller
    $members = DB::table('tbl_members')
    ->join('tbl_address', 'tbl_members.id', '=', 'tbl_address.member_id')
    ->select('tbl_members.first_name', 'tbl_members.last_name', 'tbl_address.city', 'tbl_address.state')
    ->get();

    pertanyaan5:
    pastikan model client sudah ada ini:
    class Client extends Model
    {
        public function invoices()
        {
            return $this->hasMany(Invoice::class, 'client_id', 'id');
        }
    }

    $clientsWithNoInvoices = DB::table('tbl_clients as c')
    ->leftJoin('tbl_invoices as i', 'c.id', '=', 'i.client_id')
    ->whereNull('i.client_id')
    ->select('c.name as Clients')
    ->get();

    Pertanyaan 6:
    $duplicateMobiles = DB::table('contacts')
    ->select('Mobile')
    ->groupBy('Mobile')
    ->havingRaw('COUNT(Mobile) > 1')
    ->get();

    <script>
        function getStringLengths(array) {
            return array.map(function(str) {
                return str.length;
            });
        }

        function lengthOfAllStrings() {
            const strings = ["Nutella", "Mars", "Snickers", "Kinder", "Cadbury"];
            const lengths = getStringLengths(strings);

            // Tampilkan hasilnya di halaman
            document.getElementById('output1').textContent = lengths.join(', ');
        }

        function checkPalindrome(str) {
            // Balikkan string
            const reversedStr = str.split('').reverse().join('');

            // Bandingkan string asli dengan string yang sudah dibalik
            if (str === reversedStr) {
                return str.length;
            } else {
                return false;
            }
        }

        function checkPalindromeInput() {
            // Ambil nilai input
            const inputStr = document.getElementById('palindrom').value;

            // Proses nilai input dengan fungsi checkPalindrome
            const result = checkPalindrome(inputStr);

            // Tampilkan hasil di paragraf
            document.getElementById('palindromTrue').textContent = result;
        }

        function sumEvenNumbers(array) {
            // Filter bilangan genap dan jumlahkan
            return array.filter(function(num) {
                return num % 2 === 0;
            }).reduce(function(sum, num) {
                return sum + num;
            }, 0);
        }

        function arrayFilter() {
            const numbers = [15, 18, 3, 9, 6, 2, 12];
            const total = sumEvenNumbers(numbers);

            document.getElementById('output3').textContent = total;
        }

        // Panggil fungsi lengthOfAllStrings dan arrayFilter saat halaman dimuat
        window.onload = function() {
            lengthOfAllStrings();
            arrayFilter();
        };
    </script>
</body>

</html>
