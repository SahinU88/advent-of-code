checksum = 0

input = File.open( 'input.txt' ).read
input.gsub!(/\r\n?/, "\n")
input.each_line do |line|
    numbers = line.split( '|' ).map { |s| s.to_i }.sort
    matched = numbers.combination( 2 ).select { |pair|
        ( pair.last % pair.first == 0 )
    }
    checksum += matched.first.last / matched.first.first
end

puts checksum