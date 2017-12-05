// credit to: https://www.reddit.com/r/adventofcode/comments/7h7ufl/2017_day_3_solutions/dqp5r1g/

function count_steps_in_spiral(input) {
    let [x, y] = [0, 0];
    let [inc, dir, mem] = [1, 1, 1];

    for (; ;) {

        for (let i = 1; i < inc + 1; i++) {
            mem++;
            x = (dir === 1) ? x + 1 : (dir === 3) ? x - 1 : x; // right or left
            y = (dir === 2) ? y + 1 : (dir === 4) ? y - 1 : y; // up or down

            if (mem === input) { // found target
                return Math.abs(x) + Math.abs(y);
            }
        }

        dir = (dir === 4) ? 1 : dir + 1;

        if ((dir === 1) || (dir === 3)) {
            inc++;
        }
    }
};

count_steps_in_spiral(325489);