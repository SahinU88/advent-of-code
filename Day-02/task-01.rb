checksum = 0

input = File.open( 'input.txt' ).read
input.gsub!(/\r\n?/, "\n")
input.each_line do |line|
    numbers = line.split( '|' ).map { |s| s.to_i }
    minmax = numbers.minmax
    checksum += ( minmax.last - minmax.first )
end

puts checksum