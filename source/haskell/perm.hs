import System.Environment (getArgs)
import Data.List (permutations)
import Data.Time.Clock (getCurrentTime, diffUTCTime)
import Text.Printf

-- Define a lazy stream of permutations
permStream :: [a] -> [[a]]
permStream = permutations

main :: IO ()
main = do
  args <- getArgs

  case args of
    [lengthStr] -> do

      start <- getCurrentTime

      let lengthInput = read lengthStr :: Int
      let inputList = [1..lengthInput]
      let allPerms = permStream inputList
      let count = length allPerms
      putStr $ "λ: " ++ show count ++ " permutations"
      stop <- getCurrentTime
      let delta = diffUTCTime stop start
      let timeTaken = realToFrac delta :: Double
      putStrLn $ " in " ++ printf "%.8f" timeTaken ++ " seconds"

    _ -> putStrLn "Usage: ./Permutations <length>"