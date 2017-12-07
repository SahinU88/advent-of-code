memory = [ 14, 0, 15, 12, 11, 11, 3, 5, 1, 6, 8, 4, 9, 1, 8, 4 ]
states = []

def redistribute( block ):
    m = max( block )
    i = block.index( m )
    block[ i ] = 0
    while m:
        i = ( i+1 ) % len( block )
        block[ i ] += 1
        m -= 1

while memory not in states:
    states.append( memory[:] ) # [:] --> slice operation to copy array
    redistribute( memory )

print len( states )

# part 02
print len( states ) - states.index( memory )