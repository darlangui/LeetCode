#include <iostream>
#include <vector>

using namespace std;

class Solution {
public:
  int dfs(int i, int j, vector<int>& nums, int turn) {
    if (i == nums.size() || j == -1) return 0;
    if (i > j) return 0;
    if (turn == 0) {
      return max(nums[i] + dfs(i + 1, j, nums, 1),
                 nums[j] + dfs(i, j - 1, nums, 1));
    }
    else {
      return min(-nums[i] + dfs(i + 1, j, nums, 0),
                 -nums[j] + dfs(i, j - 1, nums, 0));
    }
  }
  bool PredictTheWinner(vector<int>& nums) {
    int n = nums.size();
    int val = dfs(0, n - 1, nums, 0);
    return val >= 0;
  }
};

int main() {
  Solution solution;

  // Test case 1
  vector<int> nums1 = {1, 5, 2};
  cout << "Test case 1: " << (solution.PredictTheWinner(nums1) ? "True" : "False") << endl;

  // Test case 2
  vector<int> nums2 = {1, 5, 233, 7};
  cout << "Test case 2: " << (solution.PredictTheWinner(nums2) ? "True" : "False") << endl;

  // Test case 3
  vector<int> nums3 = {1, 2, 3, 4, 5};
  cout << "Test case 3: " << (solution.PredictTheWinner(nums3) ? "True" : "False") << endl;

  return 0;
}
